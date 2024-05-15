<?php

namespace core;

use ReflectionClass;
use ReflectionProperty;
use ReflectionException;
use JsonSerializable;

abstract class Model implements JsonSerializable {

    /**
     * @throws ReflectionException
     */
    static function deserialize(mixed $object): ?Model {

        $instance = new static();
        $objJson = gettype($object) == "string" ? json_encode($object) : json_decode(json_encode($object));
        $classInfo = new ReflectionClass($instance);
        $publicProps = $classInfo->getProperties();
        foreach ($publicProps as $prop) {
            $propName = $prop->name;
            $prop->setValue($instance, $objJson->$propName?:null);
        }
        return $instance;
    }

    /**
     * @throws ReflectionException
     */
    static function jsonDeserialize(string $json): ?Model {

        return self::deserialize($json);
    }

    public abstract function jsonSerialize(): mixed;
}
