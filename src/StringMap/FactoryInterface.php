<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\StringMap;

use Neighborhoods\Buphalo\StringMapInterface;

interface FactoryInterface
{
    public function create(): StringMapInterface;
}
