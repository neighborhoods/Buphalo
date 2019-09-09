<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree\Builder;

use Neighborhoods\Buphalo\TemplateTree\BuilderInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getTemplateTreeBuilder();
    }
}
