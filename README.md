# Bradfab
Fabricates patterns.

Anything good I stole from someone else. Anything bad is mine.

##### Table of Contents  
* [Problem](#problem)
* [Proposed Solution](#proposed-solution)
* [Getting Started](#getting-started) 
* [Definitions](#definitions)
* [Features](#features)
* [Contributing To Bradfab](#contributing-to-bradfab) 

## Problem
Implementing well designed patterns can become tedious and laborious which discourages their implementation in favor of patterns that are less well designed but have a faster development velocity.

## Proposed Solution
Employ an easy to change code generation tool to generate well designed patterns so that the development velocity is equivalent or faster than less well designed patterns.

## Getting Started

### Example Fabrication Files
* Relative to the root of your software product.
```yml
# src/V2/Toe.fabricate.yml
supporting_actors:
  AwareTrait:
  Factory:
  FactoryInterface:
  Factory\AwareTrait:
  Builder:
  BuilderInterface:
  Builder\AwareTrait:
  Builder\Factory:
  Builder\FactoryInterface:
  Builder\Factory\AwareTrait:
  Repository:
  RepositoryInterface:
  Repository\AwareTrait:
  Map:
  MapInterface:
  Map\AwareTrait:
  Map\Factory:
  Map\FactoryInterface:
  Map\Factory\AwareTrait:
  Map\Builder:
  Map\BuilderInterface:
  Map\Builder\AwareTrait:
  Map\Builder\Factory:
  Map\Builder\FactoryInterface:
  Map\Builder\Factory\AwareTrait:
```
```yml
# src/V2/Toe/Nail.fabricate.yml
supporting_actors:
  AwareTrait:
  Factory:
  FactoryInterface:
  Factory\AwareTrait:
  Builder:
  BuilderInterface:
  Builder\AwareTrait:
  Builder\Factory:
  Builder\FactoryInterface:
  Builder\Factory\AwareTrait:
```

### Turning Off Fabrication Of A Supporting Actor
* Just don't include the Supporting Actor entry in the `Fabrication File` for the `<Object>` to begin with.
* Remove the Supporting Actor entry from the `Fabrication File` for the `<Object>`.
* Comment the Supporting Actor entry from the `Fabrication File` for the `<Object>`.

### Adding A New Template
* Add the appropriate PHP and DI service definition YAML files in the position that you want them under `src/Template/Actor`.

### Updating An Existing Template
* Update the PHP and/or DI service definition YAML files under `src/Template/Actor`.

## Definitions

### Fabrication File
* A `Fabrication File` contains the instructions for fabricating a [`Fablet`](#fablet) for any arbitrary `<Object>`.
* The [`Fablet`](#fablet) `<Object>` is identified by the `Fabrication File` file name, and the location of the `Fabrication File` within the directory structure that it resides.
* In the [Example Fabrication Files](#example-fabrication-files) section one [`Fablet`](#fablet) `<Object>` is `Toe` and another [`Fablet`](#fablet) `<Object>` is `Toe\Nail`.
* A [`Fablet`](#fablet) `<Object>` can be any PHP object.

### Fablet
(credit [Mucha](https://github.com/pmucha-55places))
* A `Fablet` is the collection of Supporting Actors that are built from the Fabrication File for an `<Object>`.

## Features
* Only fabricates files that do not exist in `src`.

### Annotation Replacement
* Default replacement is accomplished by using the contents of the annotation.
* `static_context_record` MUST resolve to a PHP `array`.
* Annotation processors MUST implement `\Rhift\Bradfab\AnnotationProcessorInterface`
```php
namespace Rhift\Bradfab;

use Rhift\Bradfab\AnnotationProcessor\ContextInterface;

interface AnnotationProcessorInterface
{
    public function setAnnotationProcessorContext(ContextInterface $Context);

    public function getAnnotationProcessorContext(): ContextInterface;

    public function getReplacement(): string;

    public function setAnnotationContents(string $annotation_contents): AnnotationProcessorInterface;
}
```
* Annotation processors have accesss to the static context and the Fabrication File by accessing the injected `\Rhift\Bradfab\AnnotationProcessor\ContextInterface` object.

### Example Annotation Replacement
* Annotation Tag: `@rhift-bradfab:annotation-processor`
* Annotation Processor Keys:
  * `Rhift\Bradfab\Template\Actor\Builder.build1`
  * `Rhift\Bradfab\Template\Actor\Builder.build2`
* The keys above are named according to a collision avoidance convention. However, there is no requirement on the key name except for uniqueness.
```php
// src/Template/Actor/Builder.php
    public function build(): ActorInterface
    {
        $Actor = $this->getActorFactory()->create();
        /** @rhift-bradfab:annotation-processor Rhift\Bradfab\Template\Actor\Builder.build1
         */
        /** @rhift-bradfab:annotation-processor Rhift\Bradfab\Template\Actor\Builder.build2
        // @TODO - build the object.
        throw new \LogicException('Unimplemented build method.');
         */

        return $Actor;
    }
```
```yml
# src/V2/Toe.fabricate.yml
supporting_actors:
# ...
  Builder.php:
    annotation_processors:
      Rhift\Bradfab\Template\Actor\Builder.build1:
        processor_fqcn: \VENDOR\PRODUCT\AnAnnotationProcessor
      Rhift\Bradfab\Template\Actor\Builder.build2:
        processor_fqcn: \VENDOR\PRODUCT\AnotherAnnotationProcessor
        static_context_record:
          head: 'shoulders'
          knees: 'fingers'
  BuilderInterface:
# ...
```
* If no annotation processors are defined then `\Rhift\Bradfab\AnnotationProcessor` is used and the above compiles as 
```php
    public function build(): TestInterface
    {
        $Test = $this->getFabricationFileSupportingActorTestFactory()->create();
        
        
        // @TODO - build the object.
        throw new \LogicException('Unimplemented build method.');

        return $Test;
    }
```

### User Space Template Trees
* User space template trees are merged with the `Bradfab` template tree, collision precedence favors user space.

## Contributing to Bradfab
The `1.x` feature series establishes the fitness precedence of `Bradfab` for all future feature versions of `Bradfab`. All of the following fitness requirements MUST be met for all future versions. 
* Any Supporting Actors (and any associated files) MUST be as easy to add/update/remove as they are in `1.x`.
* Fabrication must be as fast as it is in `1.x`.
* The `source` target, `fabrication` target, and `Template Tree` target MUST be user defined so that `Bradfab` can be composed and used to build any arbitrary Template Tree.
* `Method Fill` MUST be as easy to add/update/remove as it is in `1.x`.
* `Method Fill` MUST be as transparent and flexible to user space as it is in `1.x`.
* `Fabrication File`s MUST be as easy to add/update/remove as they are in `1.x`.
* Future versions of `Bradfab` can add to the `1.x` fitness requirements but not alter or remove a member of the `1.x` fitness requirements as it is the definition of the mission of `Bradfab`.
