<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Writer\Builder;

use Rhift\Bradfab\SupportingActor\Writer\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
