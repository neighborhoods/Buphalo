<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\AnnotationTokenizer;

use Neighborhoods\Bradfab\Actor\Template\AnnotationTokenizerInterface;

interface BuilderInterface
{
    public function build(): AnnotationTokenizerInterface;
}
