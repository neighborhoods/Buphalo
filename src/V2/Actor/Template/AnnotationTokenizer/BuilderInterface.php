<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\AnnotationTokenizer;

use Neighborhoods\Buphalo\V2\Actor\Template\AnnotationTokenizerInterface;
use Neighborhoods\Buphalo\V2\FabricationFileInterface;

interface BuilderInterface
{
    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function build(): AnnotationTokenizerInterface;
}
