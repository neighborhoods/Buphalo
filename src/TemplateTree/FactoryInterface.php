<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree;

use Neighborhoods\Bradfab\TemplateTreeInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): TemplateTreeInterface;
}
