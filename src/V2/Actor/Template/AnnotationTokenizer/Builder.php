<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\AnnotationTokenizer;

use Neighborhoods\Buphalo\V2\Actor\Template\AnnotationTokenizerInterface;
use Neighborhoods\Buphalo\V2\FabricationFile;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use FabricationFile\AwareTrait;

    public function build(): AnnotationTokenizerInterface
    {
        $annotationTokenizer = $this->getActorTemplateAnnotationTokenizerFactory()->create();
        $annotationTokenizer->setFabricationFile($this->getFabricationFile());

        return $annotationTokenizer;
    }
}
