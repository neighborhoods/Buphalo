<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\RelativeParentActorClassPath;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\RelativeParentActorClassPathInterface;

interface FactoryInterface
{
    public function create(): ParentActorNameInterface;
}
