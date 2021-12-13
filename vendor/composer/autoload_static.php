<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitba48f6473fb26653fbd9a180d70c3ce1
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'RedBeanPHP\\' => 11,
        ),
        'D' => 
        array (
            'DiDom\\' => 6,
        ),
        'B' => 
        array (
            'Blog\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
        ),
        'DiDom\\' => 
        array (
            0 => __DIR__ . '/..' . '/imangazaliev/didom/src/DiDom',
        ),
        'Blog\\' => 
        array (
            0 => __DIR__ . '/../..' . '/blog/Core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitba48f6473fb26653fbd9a180d70c3ce1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitba48f6473fb26653fbd9a180d70c3ce1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitba48f6473fb26653fbd9a180d70c3ce1::$classMap;

        }, null, ClassLoader::class);
    }
}
