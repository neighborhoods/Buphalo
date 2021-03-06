<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1;

use Symfony\Component\Filesystem\Filesystem;

interface FabricatorInterface
{
    public function fabricate(): FabricatorInterface;

    public function setFilesystem(Filesystem $filesystem): FabricatorInterface;

    public function getFilesystem(): Filesystem;
}
