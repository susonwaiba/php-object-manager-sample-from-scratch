<?php

namespace App;

class ObjectManager
{
    protected array $objects = [];

    /**
     * @param array<int,mixed> $args
     */
    public function get(string $className, array $args = []): object
    {
        if (!isset($this->objects[$className])) {
            $this->objects[$className] = $this->create($className, $args);
        }

        return $this->objects[$className];
    }

    /**
     * @param array<int,mixed> $args
     */
    public function create(string $className, array $args = []): object
    {
        $reflection = new \ReflectionClass($className);
        $constructor = $reflection->getConstructor();

        $objArgs = [];
        foreach ($constructor->getParameters() as $param) {
            if (isset($args[$param->getName()])) {
                $objArgs[$param->getName()] = $args[$param->getName()];
            } elseif ($param->getClass() !== null) {
                $className = $param->getClass()->getName();
                // Below might throw error if depencency class doesnot exist
                // but no need to handling that, bubble up error
                $objArgs[$param->getName()] = $this->get($className);
            } elseif (
                !isset($args[$param->getName()]) &&
                !isset($args[$param->getPosition()]) &&
                $param->getDefaultValue()
            ) {
                $objArgs[$param->getName()] = $param->getDefaultValue();
            } else {
                $position = $param->getPosition();
                if (isset($args[$position])) {
                    $objArgs[$param->getName()] = $args[$position];
                }
            }
        }

        return $reflection->newInstanceArgs($objArgs);
    }
}
