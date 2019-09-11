<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\Tokenizer\Builder;

use Neighborhoods\Buphalo\Actor\Template\Tokenizer\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
