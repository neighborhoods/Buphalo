<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree;

use LogicException;
use Neighborhoods\Buphalo\TemplateTreeInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    protected $DirectoryPath;

    public function build(): TemplateTreeInterface
    {
        $templateTree = $this->getTemplateTreeFactory()->create();
        $templateTree->setDirectoryPath($this->getDirectoryPath());

        return $templateTree;
    }

    protected function getDirectoryPath(): string
    {
        if ($this->DirectoryPath === null) {
            throw new LogicException('Builder Directory Path has not been set.');
        }

        return $this->DirectoryPath;
    }

    public function setDirectoryPath(string $DirectoryPath): BuilderInterface
    {
        if ($this->DirectoryPath !== null) {
            throw new LogicException('Builder Directory Path is already set.');
        }

        $this->DirectoryPath = $DirectoryPath;

        return $this;
    }
}
