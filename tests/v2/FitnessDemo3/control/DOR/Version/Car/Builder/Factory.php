<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car\Builder;

use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getDORVersionCarBuilder();
    }
}
