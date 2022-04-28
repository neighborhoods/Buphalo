<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\MapInterface;

interface RepositoryInterface
{
    public function getAll() : MapInterface;
}
