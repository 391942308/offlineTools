<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae55676a89e86ccad9966bd94e203b28
{
    public static $files = array (
        'decc78cc4436b1292c6c0d151b19445c' => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'p' => 
        array (
            'phpseclib3\\' => 11,
        ),
        'P' => 
        array (
            'PhpAmqpLib\\' => 11,
            'ParagonIE\\ConstantTime\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'phpseclib3\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib',
        ),
        'PhpAmqpLib\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-amqplib/php-amqplib/PhpAmqpLib',
        ),
        'ParagonIE\\ConstantTime\\' => 
        array (
            0 => __DIR__ . '/..' . '/paragonie/constant_time_encoding/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae55676a89e86ccad9966bd94e203b28::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae55676a89e86ccad9966bd94e203b28::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitae55676a89e86ccad9966bd94e203b28::$classMap;

        }, null, ClassLoader::class);
    }
}
