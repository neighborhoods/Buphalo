<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
