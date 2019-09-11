<?php
declare(strict_types=1);
error_reporting(E_ALL);
require_once __DIR__ . '/../vendor/autoload.php';

use Neighborhoods\Buphalo\Buphalo;
use Neighborhoods\Buphalo\ErrorHandler;
use Neighborhoods\Buphalo\ExceptionHandler;
use Neighborhoods\Buphalo\Protean\Container\Builder;

//set_exception_handler(new ExceptionHandler());
//set_error_handler(new ErrorHandler());
$proteanContainerBuilder = (new Builder())->setApplicationRootDirectoryPath(dirname(__DIR__) . '/');

$buphalo = (new Buphalo())->setProteanContainerBuilder($proteanContainerBuilder);
$buphalo->run();
