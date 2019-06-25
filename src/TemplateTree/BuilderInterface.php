<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree;

use Neighborhoods\Bradfab\TemplateTreeInterface;

interface BuilderInterface
{
    public function build(): TemplateTreeInterface;

    public function setDirectoryPath(string $DirectoryPath): BuilderInterface;
}
