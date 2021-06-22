<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TemplateTree;

use Neighborhoods\Buphalo\V2\TemplateTreeInterface;

interface BuilderInterface
{
    public function build(): TemplateTreeInterface;

    public function setDirectoryPath(string $DirectoryPath): BuilderInterface;
}
