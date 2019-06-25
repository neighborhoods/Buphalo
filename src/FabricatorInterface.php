<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use Neighborhoods\Bradfab\TemplateTree\Map\Builder\FactoryInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

interface FabricatorInterface
{
    public function fabricate(): FabricatorInterface;

    public function setFilesystem(Filesystem $filesystem): FabricatorInterface;

    public function setFinder(Finder $finder): FabricatorInterface;

    public function getFilesystem(): Filesystem;

    public function setTemplateTreeMapBuilderFactory(FactoryInterface $templateTreeMapBuilderFactory);
}
