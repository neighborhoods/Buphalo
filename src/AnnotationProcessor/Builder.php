<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor;

use Rhift\Bradfab\AnnotationProcessorInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    protected $record;

    public function build(): AnnotationProcessorInterface
    {
        $AnnotationProcessor = $this->getAnnotationProcessorFactory()->create();
        /** @rhift-bradfab:annotation-processor Rhift\Bradfab\AnnotationProcessor\Builder.build1
         */

        /** @rhift-bradfab:annotation-processor Rhift\Bradfab\AnnotationProcessor\Builder.build2
        // @TODO - build the object.
        throw new \LogicException('Unimplemented build method.');
         */

        return $AnnotationProcessor;
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
