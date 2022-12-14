<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit766fb1b0669a34975550d5a49f5c4bc3
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Adelezz\\TapPaymentPk\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Adelezz\\TapPaymentPk\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit766fb1b0669a34975550d5a49f5c4bc3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit766fb1b0669a34975550d5a49f5c4bc3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit766fb1b0669a34975550d5a49f5c4bc3::$classMap;

        }, null, ClassLoader::class);
    }
}
