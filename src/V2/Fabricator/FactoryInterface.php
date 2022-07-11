<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Fabricator;

use Neighborhoods\Buphalo\V2\FabricatorInterface;

interface FactoryInterface
{
    public function setFabricator(FabricatorInterface $Fabricator);

    public function create(): FabricatorInterface;
}
