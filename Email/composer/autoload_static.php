<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitccab3b7827e5d6b36e8c8f5f2189a050
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitccab3b7827e5d6b36e8c8f5f2189a050::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitccab3b7827e5d6b36e8c8f5f2189a050::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitccab3b7827e5d6b36e8c8f5f2189a050::$classMap;

        }, null, ClassLoader::class);
    }
}
