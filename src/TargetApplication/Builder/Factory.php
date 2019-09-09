<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TargetApplication\Builder;

use Neighborhoods\Buphalo\TargetApplication\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getTargetApplicationBuilder();
    }
}
