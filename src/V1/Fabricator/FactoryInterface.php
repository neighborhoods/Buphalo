<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Fabricator;

use Neighborhoods\Buphalo\V1\FabricatorInterface;

interface FactoryInterface
{
    public function setFabricator(FabricatorInterface $Fabricator);

    public function create(): FabricatorInterface;
}
