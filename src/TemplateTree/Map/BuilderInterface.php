<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Map;

use Neighborhoods\Bradfab\TemplateTree\MapInterface;

interface BuilderInterface
{
    public function build(): MapInterface;

    public function setTemplateTreeDirectoryPaths(array $TemplateTreeDirectoryPaths): BuilderInterface;
}
