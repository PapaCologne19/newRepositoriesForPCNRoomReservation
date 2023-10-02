<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0b9d6ffac0edfde9d3d88234066b0e8d
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit0b9d6ffac0edfde9d3d88234066b0e8d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0b9d6ffac0edfde9d3d88234066b0e8d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0b9d6ffac0edfde9d3d88234066b0e8d::$classMap;

        }, null, ClassLoader::class);
    }
}
