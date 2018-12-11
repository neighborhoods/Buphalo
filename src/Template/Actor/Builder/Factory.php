<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor\Builder;

use Rhift\Bradfab\Template\Actor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getActorBuilder();
    }
}
