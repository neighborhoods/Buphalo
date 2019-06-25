<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Fabricator\Builder;

use Neighborhoods\Bradfab\Fabricator\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricatorBuilder();
    }
}
