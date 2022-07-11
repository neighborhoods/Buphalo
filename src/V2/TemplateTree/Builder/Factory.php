<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TemplateTree\Builder;

use Neighborhoods\Buphalo\V2\TemplateTree\BuilderInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getTemplateTreeBuilder();
    }
}
