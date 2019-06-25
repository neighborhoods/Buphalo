<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Bradfab;

use Neighborhoods\Bradfab\BradfabInterface;

interface FactoryInterface
{
    public function create(): BradfabInterface;
}
