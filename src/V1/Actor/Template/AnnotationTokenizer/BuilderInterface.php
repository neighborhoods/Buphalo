<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\AnnotationTokenizer;

use Neighborhoods\Buphalo\V1\Actor\Template\AnnotationTokenizerInterface;
use Neighborhoods\Buphalo\V1\FabricationFileInterface;

interface BuilderInterface
{
    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function build(): AnnotationTokenizerInterface;
}
