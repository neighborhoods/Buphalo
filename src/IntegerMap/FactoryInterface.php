<?php
declare(strict_types=1);

namespace Rhift\Bradfab\IntegerMap;

use Rhift\Bradfab\IntegerMapInterface;

interface FactoryInterface
{
    public function create(): IntegerMapInterface;
}
