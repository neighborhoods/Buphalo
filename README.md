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

### Running Bradfab
* Bradfab leverages an environment variable API for runtime options. The following shell command to run Bradfab illustrates the currently supported API.
```bash
BRADFAB_TARGET_APPLICATION_SOURCE_PATH=/PATH/TO/SOURCE/DIRECTORY \
BRADFAB_TARGET_APPLICATION_FABRICATION_PATH=/PATH/TO/FABRICATION/DIRECTORY \
BRADFAB_FABRICATOR_TEMPLATE_ACTOR_DIRECTORY_PATH=/PATH/TO/TEMPLATE/ACTOR/DIRECTORY \
BRADFAB_TARGET_APPLICATION_NAMESPACE=VENDOR\\PRODUCT\\ \
vendor/bin/bradfab
```
* For example, in order to Bradfab Bradfab (when Bradfab is installed as a composer dependency) execute the following shell command from your product's root.
```bash
BRADFAB_TARGET_APPLICATION_SOURCE_PATH=$PWD/vendor/neighborhoods/bradfab/src \
BRADFAB_TARGET_APPLICATION_FABRICATION_PATH=$PWD/vendor/neighborhoods/bradfab/fab \
BRADFAB_FABRICATOR_TEMPLATE_ACTOR_DIRECTORY_PATH=$PWD/vendor/neighborhoods/bradfab/src/Template/Actor/ \
BRADFAB_TARGET_APPLICATION_NAMESPACE=Neighborhoods\\Bradfab\\ \
vendor/bin/bradfab
```

### Example Fabrication Files
* Relative to the root of your software product.
```yml
# src/V2/Toe.fabricate.yml
supporting_actors:
# I WANT ALL THE ACTORS!
  AwareTrait.php:
  Factory.php:
  Factory.yml:
  FactoryInterface.php:
  Factory\AwareTrait.php:
  Builder.php:
  Builder.yml:
  BuilderInterface.php:
  Builder\AwareTrait.php:
  Builder\Factory.php:
  Builder\Factory.yml:
  Builder\FactoryInterface.php:
  Builder\Factory\AwareTrait.php:
  Repository.php:
  Repository.yml:
  RepositoryInterface.php:
  Repository\AwareTrait.php:
  Map.php:
  Map.yml:
  MapInterface.php:
  Map\AwareTrait.php:
  Map\Factory.php:
  Map\Factory.yml:
  Map\FactoryInterface.php:
  Map\Factory\AwareTrait.php:
  Map\Builder.php:
  Map\Builder.yml:
  Map\BuilderInterface.php:
  Map\Builder\AwareTrait.php:
  Map\Builder\Factory.php:
  Map\Builder\Factory.yml:
  Map\Builder\FactoryInterface.php:
  Map\Builder\Factory\AwareTrait.php:
```
```yml
# src/V2/Toe/Nail.fabricate.yml
supporting_actors:
# I only want SOME actors!
  AwareTrait.php:
  Factory.php:
  Factory.yml:
  FactoryInterface.php:
  Factory\AwareTrait.php:
  Builder.php:
  Builder.yml:
  BuilderInterface.php:
  Builder\AwareTrait.php:
  Builder\Factory.php:
  Builder\Factory.yml:
  Builder\FactoryInterface.php:
  Builder\Factory\AwareTrait.php:
  Map.php:
  Map.yml:
  MapInterface.php:
  Map\AwareTrait.php:
  Map\Factory.php:
  Map\Factory.yml:
  Map\FactoryInterface.php:
  Map\Factory\AwareTrait.php:
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

### Annotation Processors
* Annotation processors allow user space to define dynamic template content before tokenization or compilation of the template.
* Annotation processors are optional.
* Providing static context to the annotation processor is optional.
* Default annotation replacement is accomplished by using the contents of the annotation.
* If the `static_context_record` key is provided, it MUST resolve to a PHP `array`.
* Annotation processors MUST implement `\Neighborhoods\Bradfab\AnnotationProcessorInterface`
```php
namespace Neighborhoods\Bradfab;

use Neighborhoods\Bradfab\AnnotationProcessor\ContextInterface;

interface AnnotationProcessorInterface
{
    public function setAnnotationProcessorContext(ContextInterface $Context);

    public function getAnnotationProcessorContext(): ContextInterface;

    public function getReplacement(): string;
}
```
* Currently, annotation processors have accesss to the static context, the annotation contents, and the Fabrication File by accessing the injected `\Neighborhoods\Bradfab\AnnotationProcessor\ContextInterface` object.

### Example Annotation Processors
* Annotation Tag: `@neighborhoods-bradfab:annotation-processor`
* Annotation Processor Keys:
  * `Neighborhoods\Bradfab\Template\Actor\Builder.build1`
  * `Neighborhoods\Bradfab\Template\Actor\Builder.build2`
* The keys above are named according to a collision avoidance convention. However, there is no requirement on the key name except for uniqueness.
```php
// src/Template/Actor/Builder.php
    public function build(): ActorInterface
    {
        $Actor = $this->getActorFactory()->create();
        /** @neighborhoods-bradfab:annotation-processor Neighborhoods\Bradfab\Template\Actor\Builder.build1
         */
        /** @neighborhoods-bradfab:annotation-processor Neighborhoods\Bradfab\Template\Actor\Builder.build2
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
      Neighborhoods\Bradfab\Template\Actor\Builder.build1:
        processor_fqcn: \VENDOR\PRODUCT\AnAnnotationProcessor
      Neighborhoods\Bradfab\Template\Actor\Builder.build2:
        processor_fqcn: \VENDOR\PRODUCT\AnotherAnnotationProcessor
        static_context_record:
          head: 'shoulders'
          knees: 'fingers'
  Builder.yml:
# ...
```
* If no annotation processors are defined then `\Neighborhoods\Bradfab\AnnotationProcessor` is used and the above compiles as 
```php
// src/V2/Toe/Builder.php
    public function build(): ToeInterface
    {
        $Toe = $this->getToeFactory()->create();
        
        
        // @TODO - build the object.
        throw new \LogicException('Unimplemented build method.');

        return $Toe;
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

### Setting Up Git When Developing Bradfab As A Composer Dependency
* From your product root, and with Bradfab installed as a composer dependency
```bash
cd vendor/neighborhoods/bradfab && rm -rf .git && git clone git@github.com:neighborhoods/Bradfab.git && cp -R Bradfab/.git . && rm -rf Bradfab/ && cd ../../../
```
