<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor;

use ArrayAccess;
use Countable;
use Neighborhoods\Buphalo\AnnotationProcessorInterface;
use SeekableIterator;
use Serializable;

interface MapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param AnnotationProcessorInterface ...$AnnotationProcessors */
    public function __construct(array $AnnotationProcessors = array(), int $flags = 0);

    public function offsetGet($index): AnnotationProcessorInterface;

    /** @param AnnotationProcessorInterface $AnnotationProcessor */
    public function offsetSet($index, $AnnotationProcessor);

    /** @param AnnotationProcessorInterface $AnnotationProcessor */
    public function append($AnnotationProcessor);

    public function current(): AnnotationProcessorInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    /** @param AnnotationProcessorInterface ...$AnnotationProcessors */
    public function hydrate(array $AnnotationProcessors): MapInterface;
}
