<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Map;

use Neighborhoods\Bradfab\TemplateTree\Map;
use Neighborhoods\Bradfab\TemplateTree\MapInterface;

class Repository implements RepositoryInterface
{
    use Map\Builder\Factory\AwareTrait;
    use AwareTrait;

    public function get(): MapInterface
    {
        if (!$this->hasTemplateTreeMap()) {
            $this->setTemplateTreeMap($this->getTemplateTreeMapBuilderFactory()->create()->build());
        }

        return $this->getTemplateTreeMap();
    }
}
