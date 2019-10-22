<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TemplateTree\Map;

use Neighborhoods\Buphalo\V1\TemplateTree\MapInterface;

interface RepositoryInterface
{
    public function get(): MapInterface;
}
