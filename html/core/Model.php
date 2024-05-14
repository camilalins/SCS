<?php

namespace core;

use ReflectionClass;
use ReflectionProperty;
use stdClass;

abstract class Model {

    protected static function model($data, $class): ?Model {

        if(!$data) return null;

        $classInfo = new ReflectionClass($class);

        $className = $classInfo->getName();
        $object = new $className();
        foreach ($data as $k => $v) {
            $setter = "set" . ucwords($k);
            $object->$setter($v);
        }
        return $object;
    }

    protected static function object(?Model $model, $class): ?stdClass {

        if(!$model) return null;

        $classInfo = new ReflectionClass($class);
        $props   = $classInfo->getProperties(ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PROTECTED);

        $object = [];
        foreach ($props as $prop) {
            $getter = "get" . ucwords($prop->getName());
            $object[$prop->getName()] = $model->$getter();
        }
        return (object)$object;
    }

    protected static function objectList(array $models, $class): array {

        foreach ($models as $model) $results[] = self::object($model, $class);
        return $results;
    }

    public abstract static function from($data=[]): ?Model;
    public abstract static function toObject($model=[]): ?stdClass;
    public abstract static function toObjectArray($model=[]): array;
}

