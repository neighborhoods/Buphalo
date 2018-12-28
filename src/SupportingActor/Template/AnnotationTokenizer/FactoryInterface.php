<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\AnnotationTokenizer;

use Neighborhoods\Bradfab\SupportingActor\Template\AnnotationTokenizerInterface;

interface FactoryInterface
{
    public function create(): AnnotationTokenizerInterface;
}
