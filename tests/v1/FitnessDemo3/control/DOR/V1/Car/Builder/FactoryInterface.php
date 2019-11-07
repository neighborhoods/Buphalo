<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Builder;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
