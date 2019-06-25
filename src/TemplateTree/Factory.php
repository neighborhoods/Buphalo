<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree;

use Neighborhoods\Bradfab\TemplateTreeInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TemplateTreeInterface
    {
        return clone $this->getTemplateTree();
    }
}
