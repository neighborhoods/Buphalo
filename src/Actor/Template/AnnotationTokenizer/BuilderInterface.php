<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\AnnotationTokenizer;

use Neighborhoods\Buphalo\Actor\Template\AnnotationTokenizerInterface;
use Neighborhoods\Buphalo\FabricationFileInterface;

interface BuilderInterface
{
    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function build(): AnnotationTokenizerInterface;
}
