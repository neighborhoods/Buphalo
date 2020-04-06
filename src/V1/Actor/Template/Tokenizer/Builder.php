<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer;

use Neighborhoods\Buphalo\V1\Actor;
use Neighborhoods\Buphalo\V1\Actor\Template\TokenizerInterface;
use Neighborhoods\Buphalo\V1\FabricationFile;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use Actor\Template\AnnotationTokenizer\Builder\Factory\AwareTrait;
    use Actor\Template\Builder\Factory\AwareTrait;
    use Actor\AwareTrait;
    use FabricationFile\Actor\AwareTrait;
    use FabricationFile\AwareTrait;

    public function build(): TokenizerInterface
    {
        $templateBuilder = $this->getActorTemplateBuilderFactory()->create();
        $templateBuilder->setActor($this->getActor());
        $templateBuilder->setFabricationFileActor($this->getFabricationFileActor());
        $templateBuilder->setFabricationFile($this->getFabricationFile());
        $actorTemplate = $templateBuilder->build();

        $annotationTokenizerBuilder = $this->getActorTemplateAnnotationTokenizerBuilderFactory()->create();
        $annotationTokenizerBuilder->setFabricationFile($this->getFabricationFile());
        $annotationTokenizer = $annotationTokenizerBuilder->build();
        $annotationTokenizer->setActorTemplate($actorTemplate);

        $tokenizer = $this->getActorTemplateTokenizerFactory()->create();
        $tokenizer->setActorTemplate($actorTemplate);
        $tokenizer->setActorTemplateAnnotationTokenizer($annotationTokenizer);
        $tokenizer->setActor($this->getActor());

        return $tokenizer;
    }
}
