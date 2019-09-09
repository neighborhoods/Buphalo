<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Builder;

use Neighborhoods\Bradfab\Actor\Template\BuilderInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getActorTemplateBuilder();
    }
}
