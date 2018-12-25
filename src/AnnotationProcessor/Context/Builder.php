<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor\Context;

use Rhift\Bradfab\AnnotationProcessor\ContextInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    protected $record;

    public function build(): ContextInterface
    {
        $context = $this->getAnnotationProcessorContextFactory()->create();

        return $context;
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
