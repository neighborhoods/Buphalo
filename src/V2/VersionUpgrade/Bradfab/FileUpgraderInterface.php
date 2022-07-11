<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\VersionUpgrade\Bradfab;

use Neighborhoods\Buphalo\V2\FabricationFileInterface;
use Psr\Log\LoggerAwareInterface;
use SplFileInfo;

interface FileUpgraderInterface extends LoggerAwareInterface
{
    public const FILE_EXTENSION_NEW = FabricationFileInterface::FILE_EXTENSION_FABRICATION;
    public const FILE_EXTENSION_OLD = 'fabrication.yml';
    public const FILE_EXTENSION_UPGRADED = 'buphgraded';

    public function setOldFile(SplFileInfo $oldFile): self;

    public function upgrade(): self;
}
