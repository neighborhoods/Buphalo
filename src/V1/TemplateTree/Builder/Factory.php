<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TemplateTree\Builder;

use Neighborhoods\Buphalo\V1\TemplateTree\BuilderInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getTemplateTreeBuilder();
    }
}
