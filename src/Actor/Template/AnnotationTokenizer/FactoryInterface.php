<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\AnnotationTokenizer;

use Neighborhoods\Buphalo\Actor\Template\AnnotationTokenizerInterface;

interface FactoryInterface
{
    public function create(): AnnotationTokenizerInterface;
}
