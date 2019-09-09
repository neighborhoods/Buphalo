<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\VersionUpgrade\Beta\V1;

use Psr\Log\LoggerAwareInterface;
use SplFileInfo;

interface FileUpgraderInterface extends LoggerAwareInterface
{
    public const FILE_EXTENSION_OLD = '.fabrication.yml';
    public const FILE_EXTENSION_NEW = '.buphalo.v1.yml';

    public function setOldFile(SplFileInfo $oldFile): self;

    public function upgrade(): self;
}
