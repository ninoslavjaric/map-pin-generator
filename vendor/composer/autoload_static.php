<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5e338dc230d82e2aa481f3a8cdabfe69
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Logic\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Logic\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Logic',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5e338dc230d82e2aa481f3a8cdabfe69::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5e338dc230d82e2aa481f3a8cdabfe69::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
