<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template;

use Neighborhoods\Buphalo\V2\Actor\TemplateInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TemplateInterface
    {
        return clone $this->getActorTemplate();
    }
}
