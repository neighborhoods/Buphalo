<?php
declare(strict_types=1);
error_reporting(E_ALL);

# DO NOT USE THIS SCRIPT OUTSIDE OF THE BUPHALO PROJECT

require_once __DIR__ . '/../../vendor/autoload.php'; # Buphalo's Vendor Directory

use Neighborhoods\Buphalo\V1\Phar;

$pharFileName = 'buphalo.phar';
$applicationRootDirectoryPath = dirname(__DIR__);
$entryFileRelativePath = 'bin/buphalo.php';
$pharFilePath = sprintf('%s/bin/%s', $applicationRootDirectoryPath, $pharFileName);

$pharBuilder = new Phar\Builder();
$pharBuilder
    ->setPharAlias($pharFileName)
    ->setApplicationRootPath($applicationRootDirectoryPath)
    ->setEntryPoint($entryFileRelativePath)
    ->setPharLocation($pharFilePath)
    ->addIncludeDirectory('src')
    ->addIncludeDirectory('fab')
    ->addIncludeDirectory('template-tree')
    ->addIncludeDirectory('vendor')
    ->addEntryPointReplacement('/../../../../../vendor/autoload.php', '/../../vendor/autoload.php')
;

/** @noinspection PhpUnhandledExceptionInspection */
$pharBuilder->build();
