<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template;

use Neighborhoods\Bradfab\SupportingActor\TemplateInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TemplateInterface
    {
        return clone $this->getSupportingActorTemplate();
    }
}
