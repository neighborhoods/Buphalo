<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TemplateTree;

use Neighborhoods\Buphalo\V1\TemplateTreeInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TemplateTreeInterface
    {
        return clone $this->getTemplateTree();
    }
}
