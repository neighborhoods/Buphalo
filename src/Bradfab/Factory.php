<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Bradfab;

use Neighborhoods\Bradfab\BradfabInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BradfabInterface
    {
        return clone $this->getBradfab();
    }
}
