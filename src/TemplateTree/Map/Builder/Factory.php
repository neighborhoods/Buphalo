<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree\Map\Builder;

use LogicException;
use Neighborhoods\Buphalo\TemplateTree\Map\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;
    protected $TemplateTreeDirectoryPaths;

    public function create(): BuilderInterface
    {
        $templateTreeMapBuilder = clone $this->getTemplateTreeMapBuilder();
        $templateTreeMapBuilder->setTemplateTreeDirectoryPaths($this->getTemplateTreeDirectoryPaths());

        return $templateTreeMapBuilder;
    }

    public function getTemplateTreeDirectoryPaths(): array
    {
        if ($this->TemplateTreeDirectoryPaths === null) {
            throw new LogicException('Template Tree Directory Paths has not been set.');
        }

        return $this->TemplateTreeDirectoryPaths;
    }

    public function setTemplateTreeDirectoryPaths(array $TemplateTreeDirectoryPaths): FactoryInterface
    {
        if ($this->TemplateTreeDirectoryPaths !== null) {
            throw new LogicException('Template Tree Directory Paths is already set.');
        }

        $this->TemplateTreeDirectoryPaths = $TemplateTreeDirectoryPaths;

        return $this;
    }
}
