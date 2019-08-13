<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\AnnotationTokenizer;

use Neighborhoods\Bradfab\Actor\Template\AnnotationTokenizerInterface;
use Neighborhoods\Bradfab\FabricationFileInterface;

interface BuilderInterface
{
    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function build(): AnnotationTokenizerInterface;
}
