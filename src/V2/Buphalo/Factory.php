<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Buphalo;

use Neighborhoods\Buphalo\V2\BuphaloInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuphaloInterface
    {
        return clone $this->getBuphalo();
    }
}
