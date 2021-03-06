<?php
declare(strict_types=1);
error_reporting(E_ALL);

if (file_exists($autoloaderFilePath = dirname(__DIR__, 4) . '/autoload.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once $autoloaderFilePath;
} elseif (file_exists($autoloaderFilePath = dirname(__DIR__, 2) . '/vendor/autoload.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once $autoloaderFilePath;
} else {
    throw new RuntimeException('Unable to find the Composer autoloader.');
}

use Neighborhoods\Buphalo\V1\Buphalo;
use Neighborhoods\Buphalo\V1\ErrorHandler;
use Neighborhoods\Buphalo\V1\ExceptionHandler;
use Neighborhoods\Buphalo\V1\Protean\Container\Builder;

set_exception_handler(new ExceptionHandler());
set_error_handler(new ErrorHandler());
$proteanContainerBuilder = (new Builder())->setApplicationRootDirectoryPath(dirname(__DIR__, 2) . '/');

$buphalo = (new Buphalo())->setProteanContainerBuilder($proteanContainerBuilder);
$buphalo->run();
