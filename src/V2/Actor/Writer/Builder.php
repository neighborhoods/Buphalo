<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Writer;

use Neighborhoods\Buphalo\V2\Actor;
use Neighborhoods\Buphalo\V2\Actor\WriterInterface;
use Neighborhoods\Buphalo\V2\FabricationFile;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use Actor\Template\Compiler\Builder\Factory\AwareTrait;
    use Actor\Template\Tokenizer\Builder\Factory\AwareTrait;
    use Actor\Builder\Factory\AwareTrait;
    use FabricationFile\AwareTrait;
    use FabricationFile\Actor\AwareTrait;

    public function build(): WriterInterface
    {
        $compilerBuilder = $this->getActorTemplateCompilerBuilderFactory()->create();
        $compilerBuilder->setFabricationFile($this->getFabricationFile());
        $compilerBuilder->setFabricationFileActor($this->getFabricationFileActor());
        $compiler = $compilerBuilder->build();
        //$compiler->setActorTemplateCompilerStrategy($strategy);

        $writer = $this->getActorWriterFactory()->create();
        $writer->setActorTemplateCompiler($compiler);

        return $writer;
    }
}
