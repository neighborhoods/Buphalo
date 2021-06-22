<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\PrimaryActorName;

use Neighborhoods\BuphaloTemplateTree\PrimaryActorNameInterface;

interface FactoryInterface
{
    // This is the primary way of doing things
    public function create(): PrimaryActorNameInterface;
}
