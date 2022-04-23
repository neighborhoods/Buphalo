<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version;

interface NeighborInterface
{
     public function getYear(): int;
     public function setYear(int $year): NeighborInterface;

     public function getFirst(): string;
     public function setFirst(string $first): NeighborInterface;

     public function getLast(): string;
     public function setLast(string $last): NeighborInterface;
}
