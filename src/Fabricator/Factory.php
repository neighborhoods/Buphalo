<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Fabricator;

use Rhift\Bradfab\FabricatorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FabricatorInterface
    {
        return clone $this->getFabricator();
    }
}
