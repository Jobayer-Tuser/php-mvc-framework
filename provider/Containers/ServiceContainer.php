<?php

namespace Provider\Containers;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class ServiceContainer implements ContainerInterface
{
    private array $entries = [];

    /**
     * @throws \ReflectionException
     */
    public function get(string $id)
    {
        if($this->has($id)){
            $entry = $this->entries[$id];
            return $entry($this);
        }
        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable $method)
    {
        $this->entries[$id] = $method;
    }

    /**
     * @throws \ReflectionException
     */
    public function resolve(string $id)
    {
        # 1. Inspect the that we are trying to get from the container.
        $reflectionClass = new \ReflectionClass($id);
        if(! $reflectionClass->isInstantiable()){
            echo "Class is not instantiable";
        }

        # 2. Inspect the constructor of the class.
        $constructor = $reflectionClass->getConstructor();
        if(!$constructor){
            return new $id;
        }

        # 3. Inspect the constructor parameters(Dependencies).
        $parameters = $constructor->getParameters();
        if (!$parameters){
            return new $id;
        }

        # 4. If the constructor parameter is a class then try to resolve that class using the container.
        $dependencies = array_map(
            function (\ReflectionParameter $reflectionParameter) use ($id){
                $name = $reflectionParameter->getName();
                $type = $reflectionParameter->getType();

                if(!$type){
                    echo "Failed to resolve class " . $id . "because param" . $reflectionParameter ." missing in type hint";
                }

                if($type instanceof \ReflectionUnionType){
                    echo "Failed to resolve class " . $id . "because of union type for param" . $reflectionParameter;
                }

                if($type instanceof \ReflectionNamedType && $type->isBuiltin()){
                    try {
                        return $this->get($type->getName());
                    } catch (NotFoundExceptionInterface | ContainerExceptionInterface $e) {
                        echo $e->getMessage();
                    }
                }
            },
            $parameters
        );

        return $reflectionClass->newInstanceArgs($dependencies);
    }
}