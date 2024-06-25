<?php

namespace core;

use ReflectionClass;
use ReflectionEnum;
use ReflectionException;
use JsonSerializable;

abstract class Model implements JsonSerializable {

    /**
     * @throws ReflectionException
     */
    static function deserialize(mixed $object): ?Model {

        try {

            $instance = new static();
            $objJson = gettype($object) == "string" ? json_encode($object) : json_decode(json_encode($object));

            $meta = Entity::metadata($instance);

            $instance = self::setValue($meta, $instance, $objJson);

            foreach ($meta->relationships as $name => $relationship) {

                $relationshipInstance = new $relationship->meta->class->qualifiedName();
                $relationshipInstance = self::setValue($relationship->meta, $relationshipInstance, $objJson);

                $propInfo = new \ReflectionProperty($instance, $name);
                $propInfo->setValue($instance, $relationshipInstance ?: null);
            }

            return $instance;
        }
        catch (\Exception) { return null; }
    }

    private static function setValue($meta, $instance, $objJson){

        $hasJoinedFields = array_reduce(array_keys((array)$objJson), function ($carry, $item) { return $carry || str_contains($item, "."); }, false);

        foreach ($meta->props as $prop) {

            $propInfo = new \ReflectionProperty($instance, $prop->name);
            $propName = $hasJoinedFields ? "{$meta->table->name}.{$prop->name}" : $propInfo->name;

            if ($c = Entity::mapColumn($instance, $propInfo->name)) $propName = $hasJoinedFields ? "{$meta->table->name}.{$c}" : $c;
            $class = $propInfo->getType()->getName();

            if (!$propInfo->getType()->isBuiltin() && (new ReflectionClass($class))->isEnum()) {
                $caseName = null;
                $enum = new ReflectionEnum($class);
                foreach ($enum->getCases() as $case)
                    if ($objJson->$propName == $case->getValue()->value)
                        $caseName = $case->getName();

                if ($caseName) {
                    $value = constant("$class::$caseName");
                    $propInfo->setValue($instance, $value);
                }
            }
            else if (in_array($propInfo->getType()->getName(), ["int", "long", "float", "double"])) {

                $propInfo->setValue($instance, $objJson->{$propName} ?: 0);
            }
            else {

                $propInfo->setValue($instance, $objJson->{$propName} ?: null);
            }

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
