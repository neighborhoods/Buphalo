<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use Neighborhoods\Bradfab\TemplateTree\Map\Builder\FactoryInterface;
use Symfony\Component\Filesystem\Filesystem;

interface FabricatorInterface
{
    public function fabricate(): FabricatorInterface;

    public function setFilesystem(Filesystem $filesystem): FabricatorInterface;

    public function getFilesystem(): Filesystem;

    public function setTemplateTreeMapBuilderFactory(FactoryInterface $templateTreeMapBuilderFactory);
}
