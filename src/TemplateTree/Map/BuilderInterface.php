<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree\Map;

use Neighborhoods\Buphalo\TemplateTree\MapInterface;

interface BuilderInterface
{
    public function build(): MapInterface;

    public function setTemplateTreeDirectoryPaths(array $TemplateTreeDirectoryPaths): BuilderInterface;
}
