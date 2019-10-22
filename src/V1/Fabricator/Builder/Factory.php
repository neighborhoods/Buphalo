<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Fabricator\Builder;

use Neighborhoods\Buphalo\V1\Fabricator\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricatorBuilder();
    }
}
