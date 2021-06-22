<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Fabricator;

use Neighborhoods\Buphalo\V2\FabricatorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FabricatorInterface
    {
        return clone $this->getFabricator();
    }
}
