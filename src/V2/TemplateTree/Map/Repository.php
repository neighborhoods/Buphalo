<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TemplateTree\Map;

use Neighborhoods\Buphalo\V2\TemplateTree\Map;
use Neighborhoods\Buphalo\V2\TemplateTree\MapInterface;

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
