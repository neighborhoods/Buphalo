<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

use Rhift\Bradfab\Template\ActorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): ActorInterface
    {
        return clone $this->getBradfabTemplateActor();
    }
}
