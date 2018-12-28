<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Fabricator;

use Neighborhoods\Bradfab\FabricatorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FabricatorInterface
    {
        return clone $this->getFabricator();
    }
}
