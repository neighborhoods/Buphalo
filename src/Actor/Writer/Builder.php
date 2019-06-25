<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Writer;

use Neighborhoods\Bradfab\Actor;
use Neighborhoods\Bradfab\Actor\WriterInterface;
use Neighborhoods\Bradfab\TargetApplication;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use Actor\Template\Compiler\Builder\Factory\AwareTrait;
    use Actor\Template\Tokenizer\Builder\Factory\AwareTrait;
    use TargetApplication\Builder\Factory\AwareTrait;

    public function build(): WriterInterface
    {
        $tokenizerBuilder = $this->getActorTemplateTokenizerBuilderFactory()->create();
        $tokenizer = $tokenizerBuilder->build();

        $compilerBuilder = $this->getActorTemplateCompilerBuilderFactory()->create();
        $compiler = $compilerBuilder->build();
        $compiler->setActorTemplateTokenizer($tokenizer);
        //$compiler->setActorTemplateCompilerStrategy($strategy);

        $targetApplicationBuilder = $this->getTargetApplicationBuilderFactory()->create();
        $targetApplication = $targetApplicationBuilder->build();

        $writer = $this->getActorWriterFactory()->create();
        $writer->setActorTemplateCompiler($compiler);
        $writer->setTargetApplication($targetApplication);

        return $writer;
    }
}
