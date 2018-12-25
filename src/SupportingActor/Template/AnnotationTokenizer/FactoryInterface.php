<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\AnnotationTokenizer;

use Rhift\Bradfab\SupportingActor\Template\AnnotationTokenizerInterface;

interface FactoryInterface
{
    public function create(): AnnotationTokenizerInterface;
}
