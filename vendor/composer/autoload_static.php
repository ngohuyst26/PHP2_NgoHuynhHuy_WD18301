<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit24ab893e33b0ac4350d01ff1d14715ce
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
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit24ab893e33b0ac4350d01ff1d14715ce::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit24ab893e33b0ac4350d01ff1d14715ce::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit24ab893e33b0ac4350d01ff1d14715ce::$classMap;

        }, null, ClassLoader::class);
    }
}
