<?php
class ResidenceAutoload {

    static function loadClass() {
        spl_autoload_register(array(__CLASS__, 'ResidenceAppClass'));
        spl_autoload_register(array(__CLASS__, 'ResidenceFronClass'));
    }

    static function ResidenceAppClass($classname) {
        $file = 'App/Residence/'.$classname .'.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }

    static function ResidenceFronClass($classname) {
        $file = 'App/Residence/Modules/Residence/'.$classname .'.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }

}
