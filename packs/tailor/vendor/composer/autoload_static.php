<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit90969d2e50809023713a08075274b9c0
{
    public static $files = array (
        '14d4a2e2b3338c15590254b2db0bcff8' => __DIR__ . '/../..' . '/src/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dani\\Tailor\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dani\\Tailor\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit90969d2e50809023713a08075274b9c0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit90969d2e50809023713a08075274b9c0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit90969d2e50809023713a08075274b9c0::$classMap;

        }, null, ClassLoader::class);
    }
}