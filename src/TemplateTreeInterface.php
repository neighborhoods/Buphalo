<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

interface TemplateTreeInterface
{
    public function getDirectoryPath(): string;

    public function setDirectoryPath(string $DirectoryPath): TemplateTreeInterface;
}
