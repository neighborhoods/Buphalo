<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\IntegerMap;

use Neighborhoods\Buphalo\V1\IntegerMapInterface;

interface FactoryInterface
{
    public function create(): IntegerMapInterface;
}
