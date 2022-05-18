<?php

class Autoloader {

    static public function autoload(string $classname)
    {
        include 'class/' . $classname . '.php';
    }

    static public function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }
}