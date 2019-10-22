<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Fabricator;

use Neighborhoods\Buphalo\V1\FabricatorInterface;

interface BuilderInterface
{
    public function build(): FabricatorInterface;
}
