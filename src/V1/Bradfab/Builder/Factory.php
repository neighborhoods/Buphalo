<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Buphalo\Builder;

use Neighborhoods\Buphalo\V1\Buphalo\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getBuphaloBuilder();
    }
}
