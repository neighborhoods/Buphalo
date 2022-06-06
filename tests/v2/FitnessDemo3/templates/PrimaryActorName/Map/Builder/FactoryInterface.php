<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map\Builder;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
