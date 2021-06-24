<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TemplateTree;

use Neighborhoods\Buphalo\V2\TemplateTreeInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TemplateTreeInterface
    {
        return clone $this->getTemplateTree();
    }
}
