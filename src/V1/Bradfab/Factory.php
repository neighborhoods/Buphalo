<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Buphalo;

use Neighborhoods\Buphalo\V1\BuphaloInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuphaloInterface
    {
        return clone $this->getBuphalo();
    }
}
