<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Builder;

use Neighborhoods\Bradfab\SupportingActor\Template\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getSupportingActorTemplateBuilder();
    }
}
