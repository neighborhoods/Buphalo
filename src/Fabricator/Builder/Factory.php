<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Fabricator\Builder;

use Neighborhoods\Buphalo\Fabricator\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricatorBuilder();
    }
}
