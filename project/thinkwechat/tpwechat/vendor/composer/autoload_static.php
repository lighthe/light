<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb7a7065c353532be9961eddc2b4490db
{
    public static $prefixLengthsPsr4 = array (
        'h' => 
        array (
            'houdunwang\\wechat\\' => 18,
        ),
        'A' => 
        array (
            'Addons\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'houdunwang\\wechat\\' => 
        array (
            0 => __DIR__ . '/..' . '/houdunwang/wechat/src',
        ),
        'Addons\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Addons',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb7a7065c353532be9961eddc2b4490db::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb7a7065c353532be9961eddc2b4490db::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}