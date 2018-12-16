<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Fabricator;

use Rhift\Bradfab\FabricatorInterface;

interface FactoryInterface
{
    public function create(): FabricatorInterface;
}
