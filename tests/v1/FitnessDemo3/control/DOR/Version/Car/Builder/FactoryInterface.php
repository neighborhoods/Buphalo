<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car\Builder;

use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
