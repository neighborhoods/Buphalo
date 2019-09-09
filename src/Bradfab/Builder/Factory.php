<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Bradfab\Builder;

use Neighborhoods\Bradfab\Bradfab\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getBradfabBuilder();
    }
}
