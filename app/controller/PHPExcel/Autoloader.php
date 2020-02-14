<?php

PHPExcel_Autoloader::register();
//    As we always try to run the autoloader before anything else, we can use it to do a few
//        simple checks and initialisations
//PHPExcel_Shared_ZipStreamWrapper::register();
// check mbstring.func_overload
if (ini_get('mbstring.func_overload') & 2) {
    throw new PHPExcel_Exception('Multibyte function overloading in PHP must be disabled for string functions (2).');
}
PHPExcel_Shared_String::buildCharacterSets();

class PHPExcel_Autoloader
{
    /**
     * Register the Autoloader with SPL
     *
     */
    public static function register()
    {
        if (function_exists('__autoload')) {
            // Register any existing autoloader function with SPL, so we don't get any clashes
            spl_autoload_register('__autoload');
        }
        // Register ourselves with SPL
        if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
            return spl_autoload_register(array('PHPExcel_Autoloader', 'load'), true, true);
        } else {
            return spl_autoload_register(array('PHPExcel_Autoloader', 'load'));
        }
    }

    /**
     * Autoload a class identified by name
     *
     * @param    string    $pClassName        Name of the object to load
     */
    public static function load($pClassName)
    {
        if ((class_exists($pClassName, false)) || (strpos($pClassName, 'PHPExcel') !== 0)) {
            // Either already loaded, or not a PHPExcel class request
            return false;
        }

        $pClassFilePath = PHPEXCEL_ROOT .
            str_replace('_', DIRECTORY_SEPARATOR, $pClassName) .
            '.php';

        if ((file_exists($pClassFilePath) === false) || (is_readable($pClassFilePath) === false)) {
            // Can't load
            return false;
        }
        
        require($pClassFilePath);
    }
}
