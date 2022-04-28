<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Map;

use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\MapInterface;

interface RepositoryInterface
{
    public function getAll() : MapInterface;
}
