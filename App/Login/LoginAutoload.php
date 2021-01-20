<?php
class LoginAutoload {

    static function loadClass() {
        spl_autoload_register(array(__CLASS__, 'LoginAppClass'));
        spl_autoload_register(array(__CLASS__, 'LoginBackClass'));
    }

    static function LoginAppClass($classname) {
        $file = 'App/Login/'.$classname .'.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }

    static function LoginBackClass($classname) {
        $file = 'App/Login/Modules/Login/'.$classname .'.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }

}
