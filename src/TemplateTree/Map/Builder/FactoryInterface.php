<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Map\Builder;

use Neighborhoods\Bradfab\TemplateTree\Map\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
