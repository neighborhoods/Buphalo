<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template;

use Neighborhoods\Buphalo\Actor\TemplateInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TemplateInterface
    {
        return clone $this->getActorTemplate();
    }
}
