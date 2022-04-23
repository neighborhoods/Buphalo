<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Builder;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
