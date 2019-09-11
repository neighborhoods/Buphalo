<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo;

use LogicException;

class TemplateTree implements TemplateTreeInterface
{
    protected $DirectoryPath;

    public function getDirectoryPath(): string
    {
        if ($this->DirectoryPath === null) {
            throw new LogicException('Directory Path has not been set.');
        }

        return $this->DirectoryPath;
    }

    public function setDirectoryPath(string $DirectoryPath): TemplateTreeInterface
    {
        if ($this->DirectoryPath !== null) {
            throw new LogicException('Directory Path is already set.');
        }

        $this->DirectoryPath = $DirectoryPath;

        return $this;
    }
}
