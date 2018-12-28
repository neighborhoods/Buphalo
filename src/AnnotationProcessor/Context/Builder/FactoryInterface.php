<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor\Context\Builder;

use Neighborhoods\Bradfab\AnnotationProcessor\Context\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
