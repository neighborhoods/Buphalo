<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler;

use Neighborhoods\Bradfab\Actor;
use Neighborhoods\Bradfab\Actor\Template\CompilerInterface;
use Neighborhoods\Bradfab\Actor\Template\Tokenizer;
use Neighborhoods\Bradfab\Actor\Template\TokenizerInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use Tokenizer\Builder\Factory\AwareTrait;
    use Tokenizer\AwareTrait;
    use Actor\Builder\Factory\AwareTrait;

    public function build(): CompilerInterface
    {
        $compiler = $this->getActorTemplateCompilerFactory()->create();
        $compiler->setActorTemplateTokenizer($this->getActorTemplateTokenizer());

        // @TODO - build the object.

        return $compiler;
    }

    protected function getActorTemplateTokenizer(): TokenizerInterface
    {
        if ($this->ActorTemplateTokenizer === null) {
            $actorBuilder = $this->getActorBuilderFactory()->create();
            $actorBuilder->setFabricationFile($fabricationFile);
            $actorBuilder->setFabricationFileActor($fabricationFileActor);
            $actorBuilder->setTargetApplication($this->getTargetApplication());
            $actor = $actorBuilder->build();

            $tokenizerBuilder = $this->getActorTemplateTokenizerBuilderFactory()->create();
            $tokenizerBuilder->setActorTemplate($template);
            $tokenizerBuilder->setActor($actor);
            $tokenizer = $tokenizerBuilder->build();
        }

        return $this->ActorTemplateTokenizer;
    }
}
