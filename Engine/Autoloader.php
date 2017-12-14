<?php

spl_autoload_register('Autoloader::load');

class Autoloader
{

    private static $autoloadPaths = array(
        ".",
        "Engine",
        "Engine/Abstractions",
        "Engine/Interfaces",
        "Segments",
    );

    public static function load($className)
    {
        foreach (self::$autoloadPaths as $path) {
            $file = __DIR__ . "/../" . $path . "/" . $className . ".php";
            if (file_exists($file)) {
                require_once($file);
                break;
            }
        }
    }

}
