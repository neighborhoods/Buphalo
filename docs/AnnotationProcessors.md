# Annotation Processors
Annotation Processors (APs) are optional configuration tools that allow user space to define dynamic template content.

## How Annotation Processors Work
When a template includes an appropriate [annotation][Annotations] (a special comment with a particular tag),
Buphalo will replace that comment with the results of the specified Annotation Processor.
If no Annotation Processor is specified, Buphalo uses a default AP that replaces the annotation with the contents of
the comment (sans annotation tag)

### Template Annotations
The annotations in a template use the following form with two variables:
```php
/** @neighborhoods-buphalo:annotation-processor AnnotationProcessorKey
Default Contents
*/
```
- `AnnotationProcessorKey`: Also used in the fabrication file to tie the annotation to the specific AP.
- `Default Contents`: If no AnnotationProcessor is specified in the fabrication file, this is used instead
- There MUST be a newline between the `AnnotationProcessorKey` and `Default Contents`
  - If no Default Contents exist, there SHOULD be a newline after the `AnnotationProcessorKey`.
    - If more than one annotation is used in a template, there MUST be a newline after the `AnnotationProcessorKey`

#### Example Template
```php
<?php

namespace Neighborhoods\BuphaloTemplateTree;

class Builder {
    /** @var array */
    public $record;
    
    public function build(): PrimaryActorNameInterface
    {
        $PrimaryActorName = new PrimaryActorName();
        
        /** @neighborhoods-buphalo:annotation-processor Builder.setters
        // TODO: Build the object
        throw new \LogicException('Unimplemented Build Method');
         */
        
        return $PrimaryActorName;
    }
}
```

### Fabrication File Definitions
For any actor in the fabrication file, you can specify a number of Annotation Processors to use,
keyed by the `AnnotationProcessorKey` from the Annotation in the template.
Each Annotation Processor entry includes the following:
- `processor_fqcn`: **required** A string to the Fully Qualified Class Name of the Annotation Processor class
- `static_context_record`: *optional* An object or array that the Annotation Processor has access to

#### Example Fabrication File
```yaml
actors:
  <PrimaryActorName>/Builder.php:
    template: PrimaryActorName/Builder.php
    annotation_processors:
      Builder.setters: # The AnnotationProcessorKey 
        processor_fqcn: \Neighborhoods\Buphalo\V1\AnnotationProcessors\Actor\Builder
        static_context_record:
          properties:
            - record_key: 'bar'
              set_method: 'setBar'
            - record_Key: 'baz'
              set_method: 'setBaz'
```


### Annotation Processors
Each Annotation Processor MUST `implement \Neighborhoods\Buphalo\V1\AnnotationProcessorInterface`.
This will require implementing the following methods:
```php
public function setAnnotationProcessorContext(ContextInterface $Context);
public function getAnnotationProcessorContext(): ContextInterface;
public function getReplacement(): string;
```
- `setAnnotationProcessorContext`: Used to inform the Annotation Processor of the context that it can use.
  - The `ContextInterface` includes a `getStaticContextRecord()` method
- `getAnnotationProcessorContext`: Currently required to set the Default Contents
- `getReplacement`: Returns the text that will replace the annotation in the template


#### Example Annotation Processor
```php
<?php

namespace Neighborhoods\Buphalo\V1\AnnotationProcessors\PrimaryActorName;

use Neighborhoods\Buphalo\V1;

class Builder implements V1\AnnotationProcessorInterface
{
    use V1\AnnotationProcessor\Context\AwareTrait {
        getAnnotationProcessorContext as public;
    }
    
    public function getReplacement() : string
    {
        $context = $this->getAnnotationProcessorContext()->getStaticContextRecord();
        $calls = [];
        
        foreach ($context['properties'] as $property) {
            $calls[] = sprintf(
                '        $PrimaryActorName->%s($this->record[\'%s\']);',
                $property['set_method'],
                $property['record_key']
            );
        }
        
        return implode(PHP_EOL, $calls);
    }
}
```

### Putting it all together
If the above examples are used in `Foo.buphalo.v1.fabrication.yml`,
Buphalo will generate the following to `Foo/Builder.php`:
```php
<?php

namespace ReplacedNamespace;

class Builder {
    /** @var array */
    public $record;
    
    public function build(): FooInterface
    {
        $Foo = new Foo();
        
        $Foo->setBar($this->record['bar']);
        $Foo->setBaz($this->record['baz']);
        
        return $Foo;
    }
}
```

If The `Builder.setters` Annotation Processor is not specified in `Foo.buphalo.v1.fabrication.yml`, _e.g._
```yaml
actors:
  <PrimaryActorName>/Builder.php:
    template: PrimaryActorName/Builder.php
```

Buphalo will generate the following instead (Note that the annotation was replaced with its default contents)
```php
<?php

namespace ReplacedNamespace;

class Builder {
    /** @var array */
    public $record;
    
    public function build(): FooInterface
    {
        $Foo = new Foo();
        
        // TODO: Build the object
        throw new \LogicException('Unimplemented Build Method');
        
        return $Foo;
    }
}
```

### General Purpose Annotation Processors
For more exmaples of Annotation Processors and for processors you can use out-of-the-box,
see [General Purpose Annotation Processors][GPAP]

### Known Issues
- Each Annotation Processor can only be used once.
- `getAnnotationProcessorContext` is required to be public
- Newlines MUST be present after the `AnnotationProcessorKey` even with no `Default Contents`

## References
- [General Purpose Annotation Processors][GPAP]
- [PHP Annotations][Annotations]
- [RFC 2119: Keywords](https://tools.ietf.org/html/rfc2119)

[Annotations]: https://php-annotations.readthedocs.io/en/latest/UsingAnnotations.html
[GPAP]: GeneralPurposeAnnotationProcessors.md
