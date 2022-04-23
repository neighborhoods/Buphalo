<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version;

interface CarInterface
{
     public function getYear(): int;
     public function setYear(int $year): CarInterface;

     public function getMake(): string;
     public function setMake(string $make): CarInterface;

     public function getModel(): string;
     public function setModel(string $model): CarInterface;
}
