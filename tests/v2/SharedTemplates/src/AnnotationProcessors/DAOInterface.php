<?php

namespace Neighborhoods\BuphaloTest\SharedTemplates\AnnotationProcessors;

use Neighborhoods\Buphalo\V2\AnnotationProcessor\Context;
use Neighborhoods\Buphalo\V2\AnnotationProcessorInterface;

class DAOInterface implements AnnotationProcessorInterface
{
    Use Context\AwareTrait {
        getAnnotationProcessorContext as public;
    }

    public function getReplacement(): string
    {
        $context = $this->getAnnotationProcessorContext()->getStaticContextRecord();

        $accessors = [];

        foreach($context as $field) {
            $name = $field['name'];
            $type = $field['type'];

            $accessors[] = $this->buildAccessors($name, $type);
        }

        return implode(PHP_EOL . PHP_EOL, $accessors);
    }

    private function buildAccessors($name, $type): string
    {
        $upperName = ucfirst($name);
        $interface = $this->getAnnotationProcessorContext()->getFabricationFile()->getFileName() . 'Interface';

        return <<<EOC
     public function get$upperName(): $type;
     public function set$upperName($type \$$name): $interface;
EOC;
    }
}
