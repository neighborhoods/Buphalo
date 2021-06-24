<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\AnnotationTokenizer;

use Neighborhoods\Buphalo\V2\Actor\Template\AnnotationTokenizerInterface;

interface FactoryInterface
{
    public function create(): AnnotationTokenizerInterface;
}
