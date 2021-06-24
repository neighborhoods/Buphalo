<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\VersionUpgrade\Bradfab;

use Psr\Log\LoggerAwareInterface;

interface DirectoryUpgraderInterface extends LoggerAwareInterface
{
    public function setDirectory(string $directory): DirectoryUpgraderInterface;

    public function upgrade(): DirectoryUpgraderInterface;

    public function getNumFilesProcessed(): int;
}
