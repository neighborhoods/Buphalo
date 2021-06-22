<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TargetApplication\Builder;

use Neighborhoods\Buphalo\V2\TargetApplication\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getTargetApplicationBuilder();
    }
}
