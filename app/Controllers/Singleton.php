<?php

namespace App\Controller;

class Singleton
{
    /**
     * The actual singleton's instance almost always resides inside a static
     * field. In this case, the static field is an array, where each subclass of
     * the Singleton stores its own instance.
     */
    private static array $instances = [];

    /**
     * Singleton's constructor should not be public. However, it can't be
     * private either if we want to allow subclassing.
     */
    private function __construct(){}

    /**
     * The method you use to get the Singleton's instance.
     */
    public static function getInstance() : object
    {
        # check any child available or not
        $subclass = static::class; # We can also use the class like [ $class = get_called_class() ]

        if( !isset(self::$instances[$subclass]) ){
            return self::$instances[$subclass] = new static();
        }
        return self::$instances[$subclass];
    }

    /**
     * Cloning and unserialization are not permitted for singletons.
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    protected function __wakeup(): void
    {
        // TODO: Implement __wakeup() method.
    }

}