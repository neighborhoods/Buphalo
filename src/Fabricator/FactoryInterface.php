<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Fabricator;

use Neighborhoods\Buphalo\FabricatorInterface;

interface FactoryInterface
{
    public function setFabricator(FabricatorInterface $Fabricator);

    public function create(): FabricatorInterface;
}
