<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\CarInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): CarInterface
    {
        return clone $this->getDORV1Car();
    }
}
