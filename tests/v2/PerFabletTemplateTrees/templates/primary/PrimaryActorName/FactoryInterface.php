<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorNameInterface;

interface FactoryInterface
{
    // This is the primary way of doing things
    public function create(): PrimaryActorNameInterface;
}
