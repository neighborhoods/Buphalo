<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Tokenizer;

use Neighborhoods\Bradfab\Actor;
use Neighborhoods\Bradfab\Actor\Template\TokenizerInterface;
use Neighborhoods\Bradfab\FabricationFile;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use Actor\Template\AnnotationTokenizer\Builder\Factory\AwareTrait;
    use Actor\Template\Builder\Factory\AwareTrait;
    use Actor\AwareTrait;
    use FabricationFile\Actor\AwareTrait;

    public function build(): TokenizerInterface
    {
        $templateBuilder = $this->getActorTemplateBuilderFactory()->create();
        $templateBuilder->setActor($this->getActor());
        $templateBuilder->setFabricationFileActor($this->getFabricationFileActor());
        $actorTemplate = $templateBuilder->build();

        $annotationTokenizerBuilder = $this->getActorTemplateAnnotationTokenizerBuilderFactory()->create();
        $annotationTokenizer = $annotationTokenizerBuilder->build();
        $annotationTokenizer->setActorTemplate($actorTemplate);

        $tokenizer = $this->getActorTemplateTokenizerFactory()->create();
        $tokenizer->setActorTemplate($actorTemplate);
        $tokenizer->setActorTemplateAnnotationTokenizer($annotationTokenizer);
        $tokenizer->setActor($this->getActor());

        return $tokenizer;
    }
}
