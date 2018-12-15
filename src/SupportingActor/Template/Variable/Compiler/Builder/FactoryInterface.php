<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Variable\Compiler\Builder;

use Rhift\Bradfab\SupportingActor\Template\Variable\Compiler\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
