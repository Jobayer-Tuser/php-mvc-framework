<?php

namespace Provider\Handlers;

class File
{
    /**
     * Get file full path
     *
     * @param string $path
     * @return string
     */
    public static function path(string $path): string
    {
        $path = trim($path, "/");
        return ROOT . DIRECTORY_SEPARATOR . $path;
    }

    /**
     * Check if the file exists
     *
     * @param string $path
     * @return bool
     */
    public static function exists(string $path) : bool
    {
        return file_exists(static::path(path: $path));
    }

    /**
     * Require a file
     *
     * @param string $path
     * @return void
     */
    public static function require_file(string $path) : void
    {
        if(static::exists(path: $path)){
            require_once(static::path(path: $path));
        }
    }

    /**
     * Include a file
     *
     * @param string $path
     * @return void
     */
    public static function includeFile(string $path) : void
    {
        if(static::exists($path)){
            include(static::path(path: $path));
        }
    }

    /**
     * Require a directory
     *
     * @param string $path
     * @return void
     */
    public static function requireDirectory(string $path): void
    {
        $files = array_diff(scandir(static::path(path: $path)), [".", ".."]);

        foreach ($files as $file){
            $file_path = $path . DIRECTORY_SEPARATOR . $file;
            if (static::exists($file_path)){
                static::require_file($file_path);
            }
        }
    }

}