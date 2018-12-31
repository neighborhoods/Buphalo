<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template;

use Neighborhoods\Bradfab\TargetActor\TemplateInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TemplateInterface
    {
        return clone $this->getTargetActorTemplate();
    }
}
