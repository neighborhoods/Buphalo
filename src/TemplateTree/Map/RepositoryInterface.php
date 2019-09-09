<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree\Map;

use Neighborhoods\Buphalo\TemplateTree\MapInterface;

interface RepositoryInterface
{
    public function get(): MapInterface;
}
