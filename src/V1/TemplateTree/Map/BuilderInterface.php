<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TemplateTree\Map;

use Neighborhoods\Buphalo\V1\TemplateTree\MapInterface;

interface BuilderInterface
{
    public const TEMPLATE_TREE_NAME_DEFAULT = 'default';

    public function build(): MapInterface;

    public function setTemplateTreeDirectoryPaths(array $TemplateTreeDirectoryPaths): BuilderInterface;
}
