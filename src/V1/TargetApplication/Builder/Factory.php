<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TargetApplication\Builder;

use Neighborhoods\Buphalo\V1\TargetApplication\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getTargetApplicationBuilder();
    }
}
