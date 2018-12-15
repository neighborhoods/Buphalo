<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Property\Compiler;

use Rhift\Bradfab\SupportingActor\Template\Property\CompilerInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    protected $record;

    public function build(): CompilerInterface
    {
        $Compiler = $this->getSupportingActorTemplatePropertyCompilerFactory()->create();

        // @TODO - build the object.
        throw new \LogicException('Unimplemented build method.');

        return $Compiler;
    }

    protected function getRecord(): array
    {
        if ($this->record === null) {
            throw new \LogicException('Builder record has not been set.');
        }

        return $this->record;
    }

    public function setRecord(array $record): BuilderInterface
    {
        if ($this->record !== null) {
            throw new \LogicException('Builder record is already set.');
        }

        $this->record = $record;

        return $this;
    }
}
