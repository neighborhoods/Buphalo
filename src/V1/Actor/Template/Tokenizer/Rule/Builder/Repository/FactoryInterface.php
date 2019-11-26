<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Repository;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\RepositoryInterface;

interface FactoryInterface
{
    public function create(): RepositoryInterface;
}
