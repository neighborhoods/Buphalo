<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\IntegerMap;

use Neighborhoods\Buphalo\V2\IntegerMapInterface;

interface FactoryInterface
{
    public function create(): IntegerMapInterface;
}
