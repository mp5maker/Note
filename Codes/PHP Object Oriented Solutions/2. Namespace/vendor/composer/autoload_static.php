<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit592c593252e29718ff64808fe1d07538
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Vegetables\\' => 11,
        ),
        'I' => 
        array (
            'Inventory\\' => 10,
        ),
        'F' => 
        array (
            'Fruits\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Vegetables\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Vegetables',
        ),
        'Inventory\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Fruits\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Fruits',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit592c593252e29718ff64808fe1d07538::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit592c593252e29718ff64808fe1d07538::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
