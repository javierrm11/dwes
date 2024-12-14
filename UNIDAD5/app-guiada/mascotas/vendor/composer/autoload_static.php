<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1c6eab70413c5171ede679341996515c
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1c6eab70413c5171ede679341996515c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1c6eab70413c5171ede679341996515c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1c6eab70413c5171ede679341996515c::$classMap;

        }, null, ClassLoader::class);
    }
}