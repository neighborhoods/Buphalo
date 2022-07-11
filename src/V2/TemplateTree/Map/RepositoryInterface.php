<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TemplateTree\Map;

use Neighborhoods\Buphalo\V2\TemplateTree\MapInterface;

interface RepositoryInterface
{
    public function get(): MapInterface;
}
