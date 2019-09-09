<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree;

use Neighborhoods\Buphalo\TemplateTreeInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TemplateTreeInterface
    {
        return clone $this->getTemplateTree();
    }
}
