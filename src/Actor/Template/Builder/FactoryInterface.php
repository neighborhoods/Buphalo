<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Builder;

use Neighborhoods\Bradfab\Actor\Template\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
