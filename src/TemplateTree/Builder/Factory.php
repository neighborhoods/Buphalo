<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Builder;

use Neighborhoods\Bradfab\TemplateTree\BuilderInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getTemplateTreeBuilder();
    }
}
