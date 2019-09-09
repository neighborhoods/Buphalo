<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\AnnotationTokenizer\Builder;

use Neighborhoods\Buphalo\Actor\Template\AnnotationTokenizer\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
