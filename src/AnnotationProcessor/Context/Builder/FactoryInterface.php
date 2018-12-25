<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor\Context\Builder;

use Rhift\Bradfab\AnnotationProcessor\Context\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
