<?php
class Autoload {
    static function loadClass() {
        spl_autoload_register(array(__CLASS__, 'CoreClass'));
    }

    static function CoreClass($classname) {
        $file = 'Core/JaakGroup/'.$classname .'.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }

    static function allAutoload(){
    // APP Frontend => BATI ABDUL
	require 'App/Frontend/FrontendAutoload.php';
	FrontendAutoload::loadClass();

    // APP Residence => BATI ABDUL
    require 'App/Residence/ResidenceAutoload.php';
    ResidenceAutoload::loadClass();

    // APP Backend => BATI ABDUL
    require 'App/Backend/BackendAutoload.php';
    BackendAutoload::loadClass();

    // APP Login => BATI ABDUL
    require 'App/Login/LoginAutoload.php';
    LoginAutoload::loadClass();
    }


}
