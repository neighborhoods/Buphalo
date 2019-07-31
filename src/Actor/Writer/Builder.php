<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Writer;

use Neighborhoods\Bradfab\Actor;
use Neighborhoods\Bradfab\Actor\WriterInterface;
use Neighborhoods\Bradfab\FabricationFile;
use Neighborhoods\Bradfab\TargetApplication;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use Actor\Template\Compiler\Builder\Factory\AwareTrait;
    use Actor\Template\Tokenizer\Builder\Factory\AwareTrait;
    use TargetApplication\Repository\AwareTrait;
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
        $writer->setTargetApplication($this->getTargetApplicationRepository()->get());

        return $writer;
    }
}
