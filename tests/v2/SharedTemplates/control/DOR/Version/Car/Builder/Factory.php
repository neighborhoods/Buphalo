<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Builder;

use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getDORVersionCarBuilder();
    }
}
