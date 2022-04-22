<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Api\FabricationFile\Actor;

class AnnotationProcessor implements AnnotationProcessorInterface
{
    /** @var string */
    private $processor_fqcn;

    /** @var array */
    private $static_context_record;

     public function getProcessorFqcn(): string
     {
         if ($this->processor_fqcn === null) {
             throw new \LogicException('processor_fqcn has not been set');
         }
         
         return $this->processor_fqcn;
     }
     
     public function setProcessorFqcn(string $processor_fqcn): AnnotationProcessorInterface
     {
         if ($this->processor_fqcn !== null) {
             throw new \LogicException('processor_fqcn has already been set');
         }
         
         $this->processor_fqcn = $processor_fqcn;
         return $this;
     }
     
     public function getStaticContextRecord(): array
     {
         if ($this->static_context_record === null) {
             throw new \LogicException('static_context_record has not been set');
         }
         
         return $this->static_context_record;
     }
     
     public function setStaticContextRecord(array $static_context_record): AnnotationProcessorInterface
     {
         if ($this->static_context_record !== null) {
             throw new \LogicException('static_context_record has already been set');
         }
         
         $this->static_context_record = $static_context_record;
         return $this;
     }
     
     public function hasStaticContextRecord(): bool
     {
        return $this->static_context_record !== null;
     }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
