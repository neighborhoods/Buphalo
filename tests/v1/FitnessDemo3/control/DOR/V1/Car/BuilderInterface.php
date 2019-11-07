<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\CarInterface;

interface BuilderInterface
{
    public function build(): CarInterface;

    public function setRecord(array $record): BuilderInterface;
}
