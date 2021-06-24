<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2;

interface TemplateTreeInterface
{
    public function getDirectoryPath(): string;

    public function setDirectoryPath(string $DirectoryPath): TemplateTreeInterface;
}
