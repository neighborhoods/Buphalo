<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Property\Compiler\Builder;

use Rhift\Bradfab\SupportingActor\Template\Property\Compiler\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
