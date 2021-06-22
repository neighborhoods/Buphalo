<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\StringMap;

use Neighborhoods\Buphalo\V2\StringMapInterface;

interface FactoryInterface
{
    public function create(): StringMapInterface;
}
