<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TemplateTree\Map;

use LogicException;
use Neighborhoods\Buphalo\V1\TemplateTree;
use Neighborhoods\Buphalo\V1\TemplateTree\MapInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use TemplateTree\Builder\Factory\AwareTrait;
    protected $TemplateTreeDirectoryPaths;

    public function build(): MapInterface
    {
        $map = $this->getTemplateTreeMapFactory()->create();
        foreach ($this->getTemplateTreeDirectoryPaths() as $templateTreeDirectoryPath) {
            $templateTreeBuilder = $this->getTemplateTreeBuilderFactory()->create();
            $templateTreeBuilder->setDirectoryPath($templateTreeDirectoryPath);
            $map[] = $templateTreeBuilder->build();
        }

        return $map;
    }

    protected function getTemplateTreeDirectoryPaths(): array
    {
        if ($this->TemplateTreeDirectoryPaths === null) {
            throw new LogicException('Template Tree Directory Paths has not been set.');
        }

        return $this->TemplateTreeDirectoryPaths;
    }

    public function setTemplateTreeDirectoryPaths(array $TemplateTreeDirectoryPaths): BuilderInterface
    {
        if ($this->TemplateTreeDirectoryPaths !== null) {
            throw new LogicException('Template Tree Directory Paths is already set.');
        }

        $this->TemplateTreeDirectoryPaths = $TemplateTreeDirectoryPaths;

        return $this;
    }

}
