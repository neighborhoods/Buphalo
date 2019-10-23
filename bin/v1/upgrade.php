<?php
declare(strict_types=1);
require_once __DIR__ . '/../../vendor/autoload.php';

use Neighborhoods\Buphalo\V1\VersionUpgrade;
use Neighborhoods\Buphalo\V1\Logger;

$filesFound = (function(string $directory): int {

    // TODO: Accept Versions as Arguments?
    $upgrader = new VersionUpgrade\Beta\V1\DirectoryUpgrader();
    $upgrader->setLogger(new Logger\EchoLogger());
    $upgrader->setDirectory($directory);
    $upgrader->upgrade();

    return $upgrader->getNumFilesProcessed();

})($argv[1]);

exit;

