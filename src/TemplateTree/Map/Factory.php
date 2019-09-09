<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree\Map;

use Neighborhoods\Buphalo\TemplateTree\MapInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getTemplateTreeMap()->getArrayCopy();
    }
}
