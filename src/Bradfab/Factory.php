<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Buphalo;

use Neighborhoods\Buphalo\BuphaloInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuphaloInterface
    {
        return clone $this->getBuphalo();
    }
}
