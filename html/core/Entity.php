<?php

namespace core;

use ReflectionClass;
use ReflectionProperty;

class Entity {

    public static function metadata($class): ?object {

        try {

            if(gettype($class) != "object" && gettype($class) != "string") throw new \Exception();

            $classInfo = new ReflectionClass($class);
            $props = $classInfo->getProperties(ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PROTECTED);

            $classComments = array_filter(array_map(function ($part) {
                return trim($part, " *");
            }, explode("\n", $classInfo->getDocComment())), function ($part) {
                return $part != "/";
            });
            $classEntity = current(array_filter($classComments, function ($part) {
                return strpos(strtoupper($part), "@ENTITY") !== false;
            }));
            preg_match_all('/\(([^\)]*)\)/', $classEntity, $classEntityMatches);
            $classEntityParams = array_map('trim', explode(',', str_replace("\"", "", current($classEntityMatches[1]))));
            $classEntityParamPath = current($classEntityParams);
            $tableName = $classEntityParamPath ?: strtolower($classInfo->getShortName());

            $metadata = (object)[
                "table" => (object)[
                    "name" => $tableName,
                    "schema" => MYSQL_DATABASE,
                    "qualifiedName" => MYSQL_DATABASE . "." . $tableName
                ],
                "class" => (object)[
                    "name" => $classInfo->getShortName(),
                    "namespace" => $classInfo->getNamespaceName(),
                    "qualifiedName" => $classInfo->getName(),
                    "parent" => $classInfo->getParentClass(),
                    "interfaces" => $classInfo->getInterfaceNames(),
                ],
                "props" => [],
                "relationships" => []
            ];
            foreach ($props as $prop) {
                $propComments = array_filter(array_map(function ($part) {
                    return trim($part, " *");
                }, explode("\n", $prop->getDocComment())), function ($part) {
                    return $part != "/";
                });

                $propRelation = current(array_filter($propComments, function ($part) {
                    return str_contains(strtoupper($part), "@MANYTOONE");
                }));
                preg_match_all('/\(([^\)]*)\)/', $propRelation, $propRelationMatches);
                $propRelationParams = array_map('trim', explode(',', str_replace("\"", "", current($propRelationMatches[1]))));
                if (current($propRelationParams)) {

                    $propInfo = new ReflectionProperty($class, $prop->getName());
                    $propClass = $propInfo->getType()->getName();

                    $propParamFk = current($propRelationParams);
                    $joinedMeta = self::metadata($propClass);
                    $joinedId = current(array_filter($joinedMeta->props, function ($f) {
                        return $f->isId;
                    }));

                    $metadata->relationships[$prop->getName()] = (object)[
                        "name" => $prop->getName(),
                        "type" => "ManyToOne",
                        "fk" => $propParamFk,
                        "constraint" => "{$joinedMeta->table->name}__{$joinedId->name}___{$metadata->table->name}__{$propParamFk}___fk",
                        "meta" => self::metadata($propClass)
                    ];
                }

                if (!current($propRelationMatches)) {

                    $propAnottationId = current(array_filter($propComments, function ($part) {
                        return str_contains(strtoupper($part), "@ID");
                    }));
                    preg_match('/@Id\s/i', $propAnottationId, $propAnottationIdMatches);

                    $metadata->props[$prop->getName()] = (object)[
                        "name" => $prop->getName(),
                        "isId" => !empty($propAnottationIdMatches)
                    ];
                }
            }
            return $metadata;
        }
        catch (\Exception) {  return null; }
    }

    public static function mapColumn($class, $name){

        try {
            $classInfo = new \ReflectionClass($class);
            $propInfo = $classInfo->getProperty($name);
            $propComments = array_filter(array_map(function ($part) { return trim($part," *"); }, explode("\n", $propInfo->getDocComment())), function ($part) { return $part != "/"; });
            $propColumn = current(array_filter($propComments, function ($part) { return str_contains(strtoupper($part), "@COLUMN"); }));
            preg_match_all('/\(([^\)]*)\)/', $propColumn, $propColumnMatches);
            $propColumnParams = array_map('trim', explode(',', str_replace("\"", "", current($propColumnMatches[1]))));
            return current($propColumnParams);
        }
        catch (\Exception) { return null; }
    }

    public static function parseColumnsKeys($meta): array {

        return array_reduce($meta->props, function ($map, $prop) use($meta) {

            $column = $prop->name;
            if($c = Entity::mapColumn($meta->class->qualifiedName, $prop->name)) $column = $c;

            $map[] = $column;
            return $map;
        }, []);
    }

    public static function parseColumnsValues($meta, $dto): array {

        return array_reduce($meta->props, function ($map, $prop) use($meta, $dto) {

            $column = $prop->name;
            $v = $dto[$column];

            $map[] = gettype($v) == "object" && (new ReflectionClass($v))->isEnum() ? $v->value : $v;;
            return $map;
        }, []);
    }

    public static function mapRelationship($class){

        try {
            $classInfo = new \ReflectionClass($class);
            $props   = $classInfo->getProperties(ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PROTECTED);

            $joins = [];
            foreach ($props as $prop) {
                $propComments = array_filter(array_map(function ($part) { return trim($part," *"); }, explode("\n", $prop->getDocComment())), function ($part) { return $part != "/"; });
                $propRelation = current(array_filter($propComments, function ($part) { return str_contains(strtoupper($part), "@MANYTOONE"); }));
                preg_match_all('/\(([^\)]*)\)/', $propRelation, $propRelationMatches);
                $propRelationParams = array_map('trim', explode(',', str_replace("\"", "", current($propRelationMatches[1]))));
                if (current($propRelationParams)) {
                    $propInfo = new ReflectionProperty($class, $prop->getName());
                    $propClass = $propInfo->getType()->getName();

                    $mainMeta = self::metadata($class);
                    $propParamFk = current($propRelationParams);
                    $joinedMeta = self::metadata($propClass);
                    $joinedId = current(array_filter($joinedMeta->props, function ($f) { return $f->isId; }));
                    $join = "INNER JOIN {$joinedMeta->table->qualifiedName} {$propInfo->getName()} ON {$joinedMeta->table->name}.{$joinedId->name} = {$mainMeta->table->name}.{$propParamFk}";
                    $joins[] = $join;
                }
            }
            return implode("\n", $joins);
        }
        catch (\Exception) { return null; }
    }

    public static function parseJoinColumns($meta): string {

        $mainColumns = array_reduce($meta->props, function ($map, $prop) use($meta) {

            $column = "{$meta->table->name}.{$prop->name}";
            if($c = Entity::mapColumn($meta->class->qualifiedName, $prop->name)) $column = "{$meta->table->name}.$c";

            $map[] = $column;
            return $map;
        }, []);

        $allColumns = [];
        $relationshipColumns = [];
        foreach ($meta->relationships as $name => $relationship) {

            $relationshipColumns[] = array_reduce($relationship->meta->props, function ($map, $prop) use($name, $relationship) {

                $column = "{$name}.{$prop->name}";
                if($c = Entity::mapColumn($relationship->meta->class->qualifiedName, $prop->name)) $column = "{$name}.$c";

                $map[] = $column;
                return $map;
            }, []);

            $allColumns = array_merge($mainColumns, ...$relationshipColumns);
        }
        $allColumnsWithAlias = array_map(function ($field) { return "\n$field as '$field'"; }, $allColumns);
        return implode(", ", $allColumnsWithAlias);
    }
}

