<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Fabricator;

use Neighborhoods\Buphalo\FabricatorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FabricatorInterface
    {
        return clone $this->getFabricator();
    }
}
