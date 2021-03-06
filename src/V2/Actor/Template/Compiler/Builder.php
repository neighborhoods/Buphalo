<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\Compiler;

use Neighborhoods\Buphalo\V2\Actor;
use Neighborhoods\Buphalo\V2\Actor\Template\CompilerInterface;
use Neighborhoods\Buphalo\V2\Actor\Template\Tokenizer;
use Neighborhoods\Buphalo\V2\Actor\Template\TokenizerInterface;
use Neighborhoods\Buphalo\V2\FabricationFile;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use Tokenizer\Builder\Factory\AwareTrait;
    use Tokenizer\AwareTrait;
    use Actor\Builder\Factory\AwareTrait;
    use FabricationFile\AwareTrait;
    use FabricationFile\Actor\AwareTrait;

    public function build(): CompilerInterface
    {
        $compiler = $this->getActorTemplateCompilerFactory()->create();
        $compiler->setActorTemplateTokenizer($this->getActorTemplateTokenizer());

        // @TODO - build the object.

        return $compiler;
    }

    /** @noinspection PhpHierarchyChecksInspection */ // PHPStorm thinks this extends CompilerInterface?
    protected function getActorTemplateTokenizer(): TokenizerInterface
    {
        if ($this->ActorTemplateTokenizer === null) {
            $actorBuilder = $this->getActorBuilderFactory()->create();
            $actorBuilder->setFabricationFile($this->getFabricationFile());
            $actorBuilder->setFabricationFileActor($this->getFabricationFileActor());
            $actor = $actorBuilder->build();

            $tokenizerBuilder = $this->getActorTemplateTokenizerBuilderFactory()->create();
            $tokenizerBuilder->setActor($actor);
            $tokenizerBuilder->setFabricationFileActor($this->getFabricationFileActor());
            $tokenizerBuilder->setFabricationFile($this->getFabricationFile());
            $this->ActorTemplateTokenizer = $tokenizerBuilder->build();
        }

        return $this->ActorTemplateTokenizer;
    }
}
