<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9022e8d8ed5de79f322deb3c735a7707
{
    public static $classMap = array (
        'App\\Controllers\\AuthController' => __DIR__ . '/../..' . '/app/controllers/AuthController.php',
        'App\\Controllers\\BlogsController' => __DIR__ . '/../..' . '/app/controllers/BlogsController.php',
        'App\\Controllers\\PagesController' => __DIR__ . '/../..' . '/app/controllers/PagesController.php',
        'App\\Controllers\\UserCrudController' => __DIR__ . '/../..' . '/app/controllers/UserCrudController.php',
        'App\\Core\\App' => __DIR__ . '/../..' . '/core/App.php',
        'App\\Core\\Request' => __DIR__ . '/../..' . '/core/Request.php',
        'App\\Core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
        'ComposerAutoloaderInit9022e8d8ed5de79f322deb3c735a7707' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit9022e8d8ed5de79f322deb3c735a7707' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Connection' => __DIR__ . '/../..' . '/core/database/Connection.php',
        'DevCoder\\SessionInterface' => __DIR__ . '/../..' . '/core/SessionInterface.php',
        'DevCoder\\SessionManager' => __DIR__ . '/../..' . '/core/SessionManager.php',
        'QueryBuilder' => __DIR__ . '/../..' . '/core/database/QueryBuilder.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit9022e8d8ed5de79f322deb3c735a7707::$classMap;

        }, null, ClassLoader::class);
    }
}
