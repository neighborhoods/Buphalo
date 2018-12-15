<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Variable\Compiler\Builder;

use Rhift\Bradfab\SupportingActor\Template\Variable\Compiler\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getSupportingActorTemplateVariableCompilerBuilder();
    }
}
