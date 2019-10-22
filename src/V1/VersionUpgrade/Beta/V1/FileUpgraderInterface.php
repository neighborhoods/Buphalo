<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\VersionUpgrade\Beta\V1;

use Neighborhoods\Buphalo\V1\FabricationFileInterface;
use Psr\Log\LoggerAwareInterface;
use SplFileInfo;

interface FileUpgraderInterface extends LoggerAwareInterface
{
    public const FILE_EXTENSION_OLD = FabricationFileInterface::FILE_EXTENSION_FABRICATION;
    public const FILE_EXTENSION_NEW = '.buphalo.v1.yml';

    public function setOldFile(SplFileInfo $oldFile): self;

    public function upgrade(): self;
}
