<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Bradfab\Builder;

use Neighborhoods\Bradfab\Bradfab\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
