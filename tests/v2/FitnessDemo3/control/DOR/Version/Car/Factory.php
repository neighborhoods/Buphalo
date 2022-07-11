<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car;

use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\CarInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): CarInterface
    {
        return clone $this->getDORVersionCar();
    }
}
