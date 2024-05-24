<?php

namespace core;

use models\enums\cliente\Status;
use ReflectionClass;
use ReflectionEnum;
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
            $class = $prop->getType()->getName();
            if(!$prop->getType()->isBuiltin() && (new ReflectionClass($class))->isEnum()){
                $caseName = null;
                $enum = new ReflectionEnum($class);
                foreach ( $enum->getCases() as $case )
                    if ($objJson->$propName == $case->getValue()->value)
                        $caseName = $case->getName();

                if($caseName) {
                    $value = constant("$class::$caseName");
                    $prop->setValue($instance, $value);
                }
            }
            else $prop->setValue($instance, $objJson->$propName?:null);
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
