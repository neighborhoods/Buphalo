<?php

declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\AnnotationProcessors;

use Neighborhoods\Buphalo\V2\AnnotationProcessor\Context;
use Neighborhoods\Buphalo\V2\AnnotationProcessorInterface;

class DAO implements AnnotationProcessorInterface
{
    Use Context\AwareTrait {
        getAnnotationProcessorContext as public;
    }

    public function getReplacement(): string
    {
        $context = $this->getAnnotationProcessorContext()->getStaticContextRecord();

        $properties = [];
        $accessors = [];

        foreach($context as $field) {
            $name = $field['name'];
            $type = $field['type'];

            $properties[] = $this->buildProperty($name, $type);
            $accessors[] = $this->buildAccessors($name, $type);
        }

        return implode(PHP_EOL . PHP_EOL, $properties) . PHP_EOL . PHP_EOL . implode(PHP_EOL . PHP_EOL, $accessors);
    }

    private function buildProperty(string $name, string $type): string
    {
        return <<<EOC
    /** @var $type */
    private \$$name;
EOC;

    }

    private function buildAccessors($name, $type): string
    {
        $upperName = ucfirst($name);
        $interface = $this->getAnnotationProcessorContext()->getFabricationFile()->getFileName() . 'Interface';

        return <<<EOC
     public function get$upperName(): $type
     {
         if (\$this->$name === null) {
             throw new \\LogicException('$name has not been set');
         }
         
         return \$this->$name;
     }
     
     public function set$upperName($type \$$name): $interface
     {
         if (\$this->$name !== null) {
             throw new \\LogicException('$name has already been set');
         }
         
         \$this->$name = \$$name;
         
         return \$this;
     }
EOC;
    }
}
