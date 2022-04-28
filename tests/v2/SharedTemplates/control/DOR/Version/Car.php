<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version;

class Car implements CarInterface
{
    /** @var int */
    private $year;

    /** @var string */
    private $make;

    /** @var string */
    private $model;

     public function getYear(): int
     {
         if ($this->year === null) {
             throw new \LogicException('year has not been set');
         }
         
         return $this->year;
     }
     
     public function setYear(int $year): CarInterface
     {
         if ($this->year !== null) {
             throw new \LogicException('year has already been set');
         }
         
         $this->year = $year;
         
         return $this;
     }

     public function getMake(): string
     {
         if ($this->make === null) {
             throw new \LogicException('make has not been set');
         }
         
         return $this->make;
     }
     
     public function setMake(string $make): CarInterface
     {
         if ($this->make !== null) {
             throw new \LogicException('make has already been set');
         }
         
         $this->make = $make;
         
         return $this;
     }

     public function getModel(): string
     {
         if ($this->model === null) {
             throw new \LogicException('model has not been set');
         }
         
         return $this->model;
     }
     
     public function setModel(string $model): CarInterface
     {
         if ($this->model !== null) {
             throw new \LogicException('model has already been set');
         }
         
         $this->model = $model;
         
         return $this;
     }
}
