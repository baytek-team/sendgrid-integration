<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite15a4bbfae306ea1dc715feb7184c65a
{
    public static $files = array (
        '3f8bdd3b35094c73a26f0106e3c0f8b2' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/SendGrid.php',
        '21cbceac755be8fb7e9749d0493f9436' => __DIR__ . '/../..' . '/helpers/pluggable.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SendGrid\\Stats\\' => 15,
            'SendGrid\\Mail\\' => 14,
            'SendGrid\\Contacts\\' => 18,
            'SendGrid\\' => 9,
        ),
        'B' => 
        array (
            'Baytek\\Wordpress\\SendGrid\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SendGrid\\Stats\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/stats',
        ),
        'SendGrid\\Mail\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail',
        ),
        'SendGrid\\Contacts\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/contacts',
        ),
        'SendGrid\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/php-http-client/lib',
            1 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib',
        ),
        'Baytek\\Wordpress\\SendGrid\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite15a4bbfae306ea1dc715feb7184c65a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite15a4bbfae306ea1dc715feb7184c65a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
