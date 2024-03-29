<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Api\FabricationFile\Actor\AnnotationProcessor;

use Neighborhoods\Buphalo\V2\Api\FabricationFile\Actor\AnnotationProcessorInterface;

interface MapInterface extends \SeekableIterator, \ArrayAccess, \Serializable, \Countable
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
