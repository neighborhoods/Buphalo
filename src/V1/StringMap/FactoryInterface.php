<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\StringMap;

use Neighborhoods\Buphalo\V1\StringMapInterface;

interface FactoryInterface
{
    public function create(): StringMapInterface;
}
