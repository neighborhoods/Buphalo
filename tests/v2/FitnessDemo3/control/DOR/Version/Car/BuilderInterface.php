<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Car;

use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\CarInterface;

interface BuilderInterface
{
    public function build(): CarInterface;

    public function setRecord(array $record): BuilderInterface;
}
