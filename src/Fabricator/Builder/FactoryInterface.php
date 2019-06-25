<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Fabricator\Builder;

use Neighborhoods\Bradfab\Fabricator\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
