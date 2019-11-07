<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Builder;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getDORV1CarBuilder();
    }
}
