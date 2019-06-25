<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Map;

use Neighborhoods\Bradfab\TemplateTree\MapInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getTemplateTreeMap()->getArrayCopy();
    }
}
