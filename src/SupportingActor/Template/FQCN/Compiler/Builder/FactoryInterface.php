<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\FQCN\Compiler\Builder;

use Rhift\Bradfab\SupportingActor\Template\FQCN\Compiler\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
