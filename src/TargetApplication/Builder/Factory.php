<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetApplication\Builder;

use Neighborhoods\Bradfab\TargetApplication\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getTargetApplicationBuilder();
    }
}
