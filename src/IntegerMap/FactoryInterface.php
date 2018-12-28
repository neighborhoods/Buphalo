<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\IntegerMap;

use Neighborhoods\Bradfab\IntegerMapInterface;

interface FactoryInterface
{
    public function create(): IntegerMapInterface;
}
