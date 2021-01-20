<?php
class BackendAutoload {

    static function loadClass() {
        spl_autoload_register(array(__CLASS__, 'BackendAppClass'));
        spl_autoload_register(array(__CLASS__, 'DashBackClass'));
    }

    static function BackendAppClass($classname) {
        $file = 'App/Backend/'.$classname .'.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }

    static function DashBackClass($classname) {
        $file = 'App/Backend/Modules/Dash/'.$classname .'.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }

}
