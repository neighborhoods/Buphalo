<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TemplateTree\Map;

use Neighborhoods\Buphalo\V1\TemplateTree\MapInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getTemplateTreeMap()->getArrayCopy();
    }
}
