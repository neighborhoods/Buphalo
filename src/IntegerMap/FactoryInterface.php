<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\IntegerMap;

use Neighborhoods\Buphalo\IntegerMapInterface;

interface FactoryInterface
{
    public function create(): IntegerMapInterface;
}
