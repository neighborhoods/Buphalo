<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\PropertyReference\Compiler\Builder;

use Rhift\Bradfab\SupportingActor\Template\PropertyReference\Compiler\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
