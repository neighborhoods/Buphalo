<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler\Strategy\Builder;

use Rhift\Bradfab\SupportingActor\Template\Compiler\Strategy\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
