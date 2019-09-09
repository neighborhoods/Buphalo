<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Fabricator;

use Neighborhoods\Buphalo\FabricatorInterface;

interface BuilderInterface
{
    public function build(): FabricatorInterface;
}
