<?php

namespace Neighborhoods\BuphaloFitness\Demo3\AnnotationProcessors\DAO;

use Neighborhoods\Buphalo\V1\AnnotationProcessor\Context;
use Neighborhoods\Buphalo\V1\AnnotationProcessorInterface;

class Builder implements AnnotationProcessorInterface
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

            $accessors[] = $this->buildAccessors($name);
        }

        return implode(PHP_EOL, $accessors);
    }

    private function buildAccessors($name): string
    {
        $upperName = ucfirst($name);
        $actor = $this->getAnnotationProcessorContext()->getFabricationFile()->getFileName();

        return <<<EOC
        \${$actor}->set$upperName(\$record['$name']);
EOC;
    }
}
