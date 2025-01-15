<?php

// autoload_real.php @generated by Composer

<<<<<<< HEAD
class ComposerAutoloaderInitebd8345029a7780da9cab7042791e2c0
=======
class ComposerAutoloaderInitc62468c322b9d6e95e25b165250b55b5
>>>>>>> f07f6e5675c769c77c53cc27c8cea452e8cea1fd
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

<<<<<<< HEAD
        spl_autoload_register(array('ComposerAutoloaderInitebd8345029a7780da9cab7042791e2c0', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitebd8345029a7780da9cab7042791e2c0', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitebd8345029a7780da9cab7042791e2c0::getInitializer($loader));

        $loader->register(true);

        $filesToLoad = \Composer\Autoload\ComposerStaticInitebd8345029a7780da9cab7042791e2c0::$files;
        $requireFile = \Closure::bind(static function ($fileIdentifier, $file) {
            if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
                $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

                require $file;
            }
        }, null, null);
        foreach ($filesToLoad as $fileIdentifier => $file) {
            $requireFile($fileIdentifier, $file);
=======
        spl_autoload_register(array('ComposerAutoloaderInitc62468c322b9d6e95e25b165250b55b5', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc62468c322b9d6e95e25b165250b55b5', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc62468c322b9d6e95e25b165250b55b5::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInitc62468c322b9d6e95e25b165250b55b5::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequirec62468c322b9d6e95e25b165250b55b5($fileIdentifier, $file);
>>>>>>> f07f6e5675c769c77c53cc27c8cea452e8cea1fd
        }

        return $loader;
    }
}
<<<<<<< HEAD
=======

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequirec62468c322b9d6e95e25b165250b55b5($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
>>>>>>> f07f6e5675c769c77c53cc27c8cea452e8cea1fd
