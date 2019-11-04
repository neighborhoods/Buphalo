<?php
declare(strict_types=1);

if (file_exists($autoloaderFilePath = dirname(__DIR__, 4) . '/autoload.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once $autoloaderFilePath;
} elseif (file_exists($autoloaderFilePath = dirname(__DIR__, 2) . '/vendor/autoload.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once $autoloaderFilePath;
} else {
    throw new RuntimeException('Unable to find the Composer autoloader.');
}

use Neighborhoods\Buphalo\V1\VersionUpgrade;
use Neighborhoods\Buphalo\V1\Logger;

$filesFound = (function(string $version, string $directory): int {

    if (strtolower($version) == 'bradfab') {
        $upgrader = new VersionUpgrade\Bradfab\DirectoryUpgrader();
    } else {
        throw new \InvalidArgumentException("Upgrading to V1 from version $version is not supported.");
    }

    $upgrader->setLogger(new Logger\EchoLogger());
    $upgrader->setDirectory($directory);
    $upgrader->upgrade();

    return $upgrader->getNumFilesProcessed();

})($argv[1], $argv[2]);

exit;

