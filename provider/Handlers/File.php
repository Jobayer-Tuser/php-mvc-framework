<?php

namespace Provider\Handlers;

class File
{
    /**
     * Get file full path
     *
     * @param $path
     * @return string
     */
    public static function path(string $path): string
    {
        $path = trim($path, "/");
        return $path = ROOT . DIRECTORY_SEPARATOR . $path;
    }

    /**
     * Check if the file exists
     *
     * @param $path
     * @return bool
     */
    public static function exists(string $path) : bool
    {
        return file_exists(static::path(path: $path));
    }

    /**
     * Require a file
     *
     * @param $path
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
     * @param $path
     * @return void
     */
    public static function include_file(string $path) : void
    {
        if(static::exists($path)){
            include(static::path(path: $path));
        }
    }

    /**
     * Require a directory
     *
     * @param $path
     * @return void
     */
    public static function require_directory(string $path)
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