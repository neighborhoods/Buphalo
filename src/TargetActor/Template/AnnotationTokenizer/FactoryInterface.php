<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\AnnotationTokenizer;

use Neighborhoods\Bradfab\TargetActor\Template\AnnotationTokenizerInterface;

interface FactoryInterface
{
    public function create(): AnnotationTokenizerInterface;
}
