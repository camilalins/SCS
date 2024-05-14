<?php

namespace core;

use ReflectionClass;

abstract class Model {

    protected static function convert($data, $class) {

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

    public abstract static function from($data=[]);
}

