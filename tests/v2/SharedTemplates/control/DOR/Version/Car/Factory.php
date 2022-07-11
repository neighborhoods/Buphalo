<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car;

use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\CarInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): CarInterface
    {
        return clone $this->getDORVersionCar();
    }
}
