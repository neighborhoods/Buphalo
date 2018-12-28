<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor\Context;

use Neighborhoods\Bradfab\AnnotationProcessor\ContextInterface;

interface FactoryInterface
{
    public function create(): ContextInterface;
}
