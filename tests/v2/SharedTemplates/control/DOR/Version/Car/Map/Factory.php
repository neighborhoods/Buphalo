<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Map;

use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getDORVersionCarMap()->getArrayCopy();
    }
}
