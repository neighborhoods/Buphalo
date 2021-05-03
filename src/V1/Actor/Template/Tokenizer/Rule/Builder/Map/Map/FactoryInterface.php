<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map\Map;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
