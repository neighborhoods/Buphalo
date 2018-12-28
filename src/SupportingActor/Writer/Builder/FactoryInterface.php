<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Writer\Builder;

use Neighborhoods\Bradfab\SupportingActor\Writer\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
