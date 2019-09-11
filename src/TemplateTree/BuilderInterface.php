<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree;

use Neighborhoods\Buphalo\TemplateTreeInterface;

interface BuilderInterface
{
    public function build(): TemplateTreeInterface;

    public function setDirectoryPath(string $DirectoryPath): BuilderInterface;
}
