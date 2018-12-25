<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor\Context;

use Rhift\Bradfab\AnnotationProcessor\ContextInterface;

interface FactoryInterface
{
    public function create(): ContextInterface;
}
