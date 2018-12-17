<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetApplication\Builder;

use Rhift\Bradfab\TargetApplication\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getTargetApplicationBuilder();
    }
}
