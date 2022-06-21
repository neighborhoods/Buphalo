<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Builder;

use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
