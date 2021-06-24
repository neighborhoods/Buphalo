<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\CarInterface;

interface FactoryInterface
{
    public function create(): CarInterface;
}
