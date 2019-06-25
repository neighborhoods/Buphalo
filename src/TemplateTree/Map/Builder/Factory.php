<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Map\Builder;

use LogicException;
use Neighborhoods\Bradfab\TemplateTree\Map\BuilderInterface;

/** @codeCoverageIgnore */
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

    public function getTemplateTreeDirectoryPaths()
    {
        if ($this->TemplateTreeDirectoryPaths === null) {
            throw new LogicException('Template Tree Directory Paths has not been set.');
        }

        return $this->TemplateTreeDirectoryPaths;
    }

    public function setTemplateTreeDirectoryPaths($TemplateTreeDirectoryPaths): FactoryInterface
    {
        if ($this->TemplateTreeDirectoryPaths !== null) {
            throw new LogicException('Template Tree Directory Paths is already set.');
        }

        $this->TemplateTreeDirectoryPaths = $TemplateTreeDirectoryPaths;

        return $this;
    }
}
