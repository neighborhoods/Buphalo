<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Fabricator\Builder;

use Rhift\Bradfab\Fabricator\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
