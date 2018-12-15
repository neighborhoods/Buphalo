<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\FQCN\Compiler\Builder;

use Rhift\Bradfab\SupportingActor\Template\FQCN\Compiler\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getSupportingActorTemplateFQCNCompilerBuilder();
    }
}
