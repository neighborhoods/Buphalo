<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Api\FabricationFile;

use Neighborhoods\Buphalo\V1\StringMapInterface;
use Neighborhoods\Buphalo\V1\Api\FabricationFile\Actor\AnnotationProcessor;

class Actor implements ActorInterface
{
    /** @var string */
    private $template;

    /** @var StringMapInterface */
    private $preferred_template_trees;

    /** @var AnnotationProcessor\MapInterface */
    private $annotation_processors;

     public function getTemplate(): string
     {
         if ($this->template === null) {
             throw new \LogicException('template has not been set');
         }
         
         return $this->template;
     }
     
     public function setTemplate(string $template): ActorInterface
     {
         if ($this->template !== null) {
             throw new \LogicException('template has already been set');
         }
         
         $this->template = $template;
         return $this;
     }
     

     public function getPreferredTemplateTrees(): StringMapInterface
     {
         if ($this->preferred_template_trees === null) {
             throw new \LogicException('preferred_template_trees has not been set');
         }
         
         return $this->preferred_template_trees;
     }
     
     public function setPreferredTemplateTrees(StringMapInterface $preferred_template_trees): ActorInterface
     {
         if ($this->preferred_template_trees !== null) {
             throw new \LogicException('preferred_template_trees has already been set');
         }
         
         $this->preferred_template_trees = $preferred_template_trees;
         return $this;
     }
     
     public function hasPreferredTemplateTrees(): bool
     {
        return $this->preferred_template_trees !== null;
     }
     

     public function getAnnotationProcessors(): AnnotationProcessor\MapInterface
     {
         if ($this->annotation_processors === null) {
             throw new \LogicException('annotation_processors has not been set');
         }
         
         return $this->annotation_processors;
     }
     
     public function setAnnotationProcessors(AnnotationProcessor\MapInterface $annotation_processors): ActorInterface
     {
         if ($this->annotation_processors !== null) {
             throw new \LogicException('annotation_processors has already been set');
         }
         
         $this->annotation_processors = $annotation_processors;
         return $this;
     }
     
     public function hasAnnotationProcessors(): bool
     {
        return $this->annotation_processors !== null;
     }
     

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
