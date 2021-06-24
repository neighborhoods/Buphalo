<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TemplateTree\Map;

use LogicException;
use RuntimeException;
use Neighborhoods\Buphalo\V2\TemplateTree;
use Neighborhoods\Buphalo\V2\TemplateTree\MapInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use TemplateTree\Builder\Factory\AwareTrait;
    protected $TemplateTreeDirectoryPaths;

    public function build(): MapInterface
    {
        $map = $this->getTemplateTreeMapFactory()->create();
        foreach ($this->getTemplateTreeDirectoryPaths() as $templateTreeDirectoryId) {
            if (strpos($templateTreeDirectoryId, ':') === false) {
                if (\count($this->getTemplateTreeDirectoryPaths()) > 1) {
                    throw new RuntimeException(
                        'Unnamed Template Trees are not compatible with Multiple Template Trees'
                    );
                }
                $templateTreeDirectoryKey = self::TEMPLATE_TREE_NAME_DEFAULT;
                $templateTreeDirectoryPath = $templateTreeDirectoryId;
            } else {
                [$templateTreeDirectoryKey, $templateTreeDirectoryPath] = explode(':', $templateTreeDirectoryId, 2);
            }

            $templateTreeBuilder = $this->getTemplateTreeBuilderFactory()->create();
            $templateTreeBuilder->setDirectoryPath($templateTreeDirectoryPath);

            if (isset($map[$templateTreeDirectoryKey])) {
                throw new RuntimeException(
                    sprintf(
                        'TemplateTreeDirectory with key %s is already defined as %s',
                        $templateTreeDirectoryKey,
                        $templateTreeDirectoryPath
                    )
                );
            }
            $map[$templateTreeDirectoryKey] = $templateTreeBuilder->build();
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
