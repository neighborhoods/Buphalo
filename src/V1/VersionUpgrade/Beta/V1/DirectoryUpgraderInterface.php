<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\VersionUpgrade\Beta\V1;

use Psr\Log\LoggerAwareInterface;

interface DirectoryUpgraderInterface extends LoggerAwareInterface
{
    public function setDirectory(string $directory): DirectoryUpgraderInterface;

    public function upgrade(): DirectoryUpgraderInterface;

    public function getNumFilesProcessed(): int;
}
