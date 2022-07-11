<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version;

class Neighbor implements NeighborInterface
{
    /** @var int */
    private $year;

    /** @var string */
    private $first;

    /** @var string */
    private $last;

     public function getYear(): int
     {
         if ($this->year === null) {
             throw new \LogicException('year has not been set');
         }
         
         return $this->year;
     }
     
     public function setYear(int $year): NeighborInterface
     {
         if ($this->year !== null) {
             throw new \LogicException('year has already been set');
         }
         
         $this->year = $year;
         
         return $this;
     }

     public function getFirst(): string
     {
         if ($this->first === null) {
             throw new \LogicException('first has not been set');
         }
         
         return $this->first;
     }
     
     public function setFirst(string $first): NeighborInterface
     {
         if ($this->first !== null) {
             throw new \LogicException('first has already been set');
         }
         
         $this->first = $first;
         
         return $this;
     }

     public function getLast(): string
     {
         if ($this->last === null) {
             throw new \LogicException('last has not been set');
         }
         
         return $this->last;
     }
     
     public function setLast(string $last): NeighborInterface
     {
         if ($this->last !== null) {
             throw new \LogicException('last has already been set');
         }
         
         $this->last = $last;
         
         return $this;
     }
}
