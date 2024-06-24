<?php

namespace core;

use ReflectionClass;
use ReflectionProperty;

class Entity {

    public static function metadata($class){

        $classInfo = new ReflectionClass($class);
        $props   = $classInfo->getProperties(ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PROTECTED);

        $classComments = array_filter(array_map(function ($part) { return trim($part," *"); }, explode("\n", $classInfo->getDocComment())), function ($part) { return $part != "/"; });
        $classEntity = current(array_filter($classComments, function ($part) { return strpos(strtoupper($part), "@ENTITY") !== false; }));
        preg_match_all('/\(([^\)]*)\)/', $classEntity, $classEntityMatches);
        $classEntityParams = array_map('trim', explode(',', str_replace("\"", "", current($classEntityMatches[1]))));
        $classEntityParamPath = current($classEntityParams);
        $tableName = $classEntityParamPath?:strtolower($classInfo->getShortName());

        $metadata = (object)[
            "table" => (object) [
                "name" => $tableName,
                "schema" => MYSQL_DATABASE,
                "qualifiedName" => MYSQL_DATABASE.".".$tableName
            ],
            "class" => (object)[
                "name" => $classInfo->getShortName(),
                "namespace" => $classInfo->getNamespaceName(),
                "qualifiedName" => $classInfo->getName(),
                "parent" => $classInfo->getParentClass(),
                "interfaces" => $classInfo->getInterfaceNames(),
            ],
            "props" => [] ];
        foreach ($props as $prop) {
            $propComments = array_filter(array_map(function ($part) { return trim($part," *"); }, explode("\n", $prop->getDocComment())), function ($part) { return $part != "/"; });
            $propAnottationId = current(array_filter($propComments, function ($part) { return strpos(strtoupper($part), "@ID") !== false; }));
            preg_match('/@Id\s/i', $propAnottationId, $propAnottationIdMatches);

            $metadata->props[] = (object)[
                "name" => $prop->getName(),
                "isId" => !empty($propAnottationIdMatches)
            ];
        }
        return $metadata;
    }

    public static function mapField($class){

        $classInfo = new \ReflectionClass($class);
        $classProps = $classInfo->getProperties(\ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PROTECTED);
        $classAttrs = array_filter(array_map(function ($propInfo) {
            $propComments = array_filter(array_map(function ($part) { return trim($part," *"); }, explode("\n", $propInfo->getDocComment() )), function ($part) { return $part != "/"; });
            $propColumn = current(array_filter($propComments, function ($part) { return str_contains(strtoupper($part), "@COLUMN"); }));
            preg_match_all('/\(([^\)]*)\)/', $propColumn, $propColumnMatches);
            $propColumnParams = array_map('trim', explode(',', str_replace("\"", "", current($propColumnMatches[1]))));
            $propColumnParam = current($propColumnParams);

            return $propColumnParam ? $propInfo->getName() : null;
        }, $classProps), function ($part){ return $part != null; });
        return current($classAttrs);
    }
    /*
    public static function mapColumn($class, $name){

        $classInfo = new \ReflectionClass($class);
        $propInfo = $classInfo->getProperty($name);
        $propComments = array_filter(array_map(function ($part) { return trim($part," *"); }, explode("\n", $propInfo->getDocComment())), function ($part) { return $part != "/"; });
        $propColumn = current(array_filter($propComments, function ($part) { return str_contains(strtoupper($part), "@COLUMN"); }));
        preg_match_all('/\(([^\)]*)\)/', $propColumn, $propColumnMatches);
        $propColumnParams = array_map('trim', explode(',', str_replace("\"", "", current($propColumnMatches[1]))));
        return current($propColumnParams);
    }
    */
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
}

