<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Fabricator\Builder;

use Rhift\Bradfab\Fabricator\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricatorBuilder();
    }
}
