<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite97c456475ce18bfe7fa397c28a98637
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite97c456475ce18bfe7fa397c28a98637::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite97c456475ce18bfe7fa397c28a98637::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
