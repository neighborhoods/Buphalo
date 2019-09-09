<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor\Context;

use LogicException;
use Neighborhoods\Bradfab\AnnotationProcessor\ContextInterface;
use Neighborhoods\Bradfab\FabricationFile;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use FabricationFile\AwareTrait;

    protected $record;

    public function build(): ContextInterface
    {
        $context = $this->getAnnotationProcessorContextFactory()->create();
        if ($this->hasRecord()) {
            $context->setStaticContextRecord($this->getRecord());
            $context->setFabricationFile($this->getFabricationFile());
        }

        return $context;
    }

    protected function getRecord(): array
    {
        if ($this->record === null) {
            throw new LogicException('Builder record has not been set.');
        }

        return $this->record;
    }

    protected function hasRecord(): bool
    {
        return !($this->record === null);
    }

    public function setRecord(array $record): BuilderInterface
    {
        if ($this->record !== null) {
            throw new LogicException('Builder record is already set.');
        }

        $this->record = $record;

        return $this;
    }
}
