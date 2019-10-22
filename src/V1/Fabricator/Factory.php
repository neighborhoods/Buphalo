<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Fabricator;

use Neighborhoods\Buphalo\V1\FabricatorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FabricatorInterface
    {
        return clone $this->getFabricator();
    }
}
