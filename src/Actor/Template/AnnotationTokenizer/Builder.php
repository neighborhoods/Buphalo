<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\AnnotationTokenizer;

use Neighborhoods\Bradfab\Actor\Template\AnnotationTokenizerInterface;
use Neighborhoods\Bradfab\FabricationFile;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use FabricationFile\Actor\AwareTrait;

    public function build(): AnnotationTokenizerInterface
    {
        $annotationTokenizer = $this->getActorTemplateAnnotationTokenizerFactory()->create();

        return $annotationTokenizer;
    }
}
