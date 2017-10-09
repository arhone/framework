<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d6ad3d8dba7c3f6f6bddeb3da9b91e2
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'arhone\\trigger\\' => 15,
            'arhone\\tpl\\' => 11,
            'arhone\\cache\\' => 13,
            'arhone\\builder\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'arhone\\trigger\\' => 
        array (
            0 => __DIR__ . '/..' . '/arhone/trigger',
        ),
        'arhone\\tpl\\' => 
        array (
            0 => __DIR__ . '/..' . '/arhone/tpl',
        ),
        'arhone\\cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/arhone/cache',
        ),
        'arhone\\builder\\' => 
        array (
            0 => __DIR__ . '/..' . '/arhone/builder',
        ),
    );

    public static $classMap = array (
        'arhone\\builder\\Builder' => __DIR__ . '/..' . '/arhone/builder/Builder.php',
        'arhone\\cache\\Cache' => __DIR__ . '/..' . '/arhone/cache/Cache.php',
        'arhone\\tpl\\Tpl' => __DIR__ . '/..' . '/arhone/tpl/Tpl.php',
        'arhone\\trigger\\Trigger' => __DIR__ . '/..' . '/arhone/trigger/Trigger.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d6ad3d8dba7c3f6f6bddeb3da9b91e2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d6ad3d8dba7c3f6f6bddeb3da9b91e2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8d6ad3d8dba7c3f6f6bddeb3da9b91e2::$classMap;

        }, null, ClassLoader::class);
    }
}
