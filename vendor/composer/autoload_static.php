<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0e04bc2414041ac021d1d31a6e5b40eb
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tasker\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tasker\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0e04bc2414041ac021d1d31a6e5b40eb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0e04bc2414041ac021d1d31a6e5b40eb::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
