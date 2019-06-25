<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler\Builder;

use Neighborhoods\Bradfab\Actor\Template\Compiler\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
