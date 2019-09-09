<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Map;

use Neighborhoods\Bradfab\TemplateTree\MapInterface;

interface RepositoryInterface
{
    public function get(): MapInterface;
}
