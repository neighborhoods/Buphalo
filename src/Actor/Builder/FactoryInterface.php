<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Builder;

use Neighborhoods\Bradfab\Actor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
