# [Buphalo](https://en.wikipedia.org/wiki/Buffalo_buffalo_Buffalo_buffalo_buffalo_buffalo_Buffalo_buffalo)
Fabricates patterns.

Anything good we stole from someone else. Anything bad is ours.

##### Table of Contents  
* [Summary](#summary)
* [Problem](#problem)
* [Proposed Solution](#proposed-solution)
* [Getting Started](#getting-started) 
* [Definitions](#definitions)
* [Features](#features)

## Summary
This document attempts to describe how to use Buphalo's public APIs. In addition, it tries to offer some insight into the problem that Buphalo attempts to solve and the motivation for it to solve it. If it is not described in this document, it is not considered to be a public API and is subject to change in any arbitrary release, i.e. you should not depend on it.

## Problem
Patterns are solutions to problems within a context. Implementing well designed patterns can become tedious and laborious which discourages their implementation in favor of patterns that are less well designed but have a faster development velocity.

## Proposed Solution
Employ an easy to change code generation tool that generates well designed patterns so that the development velocity is equivalent or faster than less well designed patterns.

## Getting Started

### Running Buphalo
#### Environmental Variable API

Buphalo leverages an environment variable API for runtime options. The following shell command to run Buphalo illustrates the currently supported API.
```bash
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__SourceDirectoryPath=/PATH/TO/SOURCE/DIRECTORY \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__FabricationDirectoryPath=/PATH/TO/FABRICATION/DIRECTORY \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__NamespacePrefix=VENDOR\\PRODUCT\\ \
Neighborhoods_Buphalo_V1_TemplateTree_Map_Builder_FactoryInterface__TemplateTreeDirectoryPaths=/PATH/TO/TEMPLATE/TREE/DIRECTORY \
php bin/v1/buphalo
```

For example, in order to Buphalo Buphalo (when Buphalo is installed as a composer dependency) execute the following shell command from your product's root directory.
```bash
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__SourceDirectoryPath=$PWD/vendor/neighborhoods/buphalo/src/v1 \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__FabricationDirectoryPath=$PWD/vendor/neighborhoods/buphalo/fab/v1 \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__NamespacePrefix=Neighborhoods\\Buphalo\\ \
Neighborhoods_Buphalo_V1_TemplateTree_Map_Builder_FactoryInterface__TemplateTreeDirectoryPaths=$PWD/vendor/neighborhoods/buphalo/template-tree/V1 \
php vendor/bin/v1/buphalo
```

##### Filtering
Buphalo also allows you to specify any number of specific filter rules for files with the

`Neighborhoods_Buphalo_V1_FabricationFile_Map_BuilderInterface__FinderFileNames` 

environment variable. As an env var this is "typed" as a CSV. It is then cast to an array by the Symfony DI componnent and is eventually injected into `\Symfony\Component\Finder\Finder::name`. Any rule that works for `\Symfony\Component\Finder\Finder::name` will work here.
```bash
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__SourceDirectoryPath=$PWD/vendor/neighborhoods/buphalo/src/v1 \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__FabricationDirectoryPath=$PWD/vendor/neighborhoods/buphalo/fab/v1 \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__NamespacePrefix=Neighborhoods\\Buphalo\\ \
Neighborhoods_Buphalo_V1_TemplateTree_Map_Builder_FactoryInterface__TemplateTreeDirectoryPaths=$PWD/vendor/neighborhoods/buphalo/template-tree/V1 \
Neighborhoods_Buphalo_V1_FabricationFile_Map_BuilderInterface__FinderFileNames=Connection.buphalo.v1.fabrication.yml,Connection2.buphalo.v1.fabrication.yml 
php vendor/bin/v1/buphalo
```

It is very easy to trace through the code where an environment variable is used. Buphalo uses Symfony's environment feature of the DI component to inject runtime options into objects in the container. 

### Example Fabrication Files

```yml
# This lives in /PATH/TO/SOFTWARE_PRODUCT_ROOT/src/V2/Toe.buphalo.v1.fabrication.yml

# I WANT ALL THE ACTORS!
actors:
  <ActorName>.php:
    template: Actor.php
  <ActorName>.service.yml:
    template: Actor.service.yml
  <ActorName>Interface.php:
    template: ActorInterface.php
  <ActorName>/AwareTrait.php:
    template: Actor/AwareTrait.php
  <ActorName>/Factory.php:
    template: Actor/Factory.php
  <ActorName>/Factory.service.yml:
    template: Actor/Factory.service.yml
  <ActorName>/FactoryInterface.php:
    template: Actor/FactoryInterface.php
  <ActorName>/Factory/AwareTrait.php:
    template: Actor/Factory/AwareTrait.php
  <ActorName>/Builder.php:
    template: Actor/Builder.php
  <ActorName>/Builder.service.yml:
    template: Actor/Builder.service.yml
  <ActorName>/BuilderInterface.php:
    template: Actor/BuilderInterface.php
  <ActorName>/Builder/AwareTrait.php:
    template: Actor/Builder/AwareTrait.php
  <ActorName>/Builder/Factory.php:
    template: Actor/Builder/Factory.php
  <ActorName>/Builder/Factory.service.yml:
    template: Actor/Builder/Factory.service.yml
  <ActorName>/Builder/FactoryInterface.php:
    template: Actor/Builder/FactoryInterface.php
  <ActorName>/Builder/Factory/AwareTrait.php:
    template: Actor/Builder/Factory/AwareTrait.php
  <ActorName>/Repository.php:
    template: Actor/Repository.php
  <ActorName>/Repository.service.yml:
    template: Actor/Repository.service.yml
  <ActorName>/RepositoryInterface.php:
    template: Actor/RepositoryInterface.php
  <ActorName>/Repository/AwareTrait.php:
    template: Actor/Repository/AwareTrait.php
  <ActorName>/Map.php:
    template: Actor/Map.php
  <ActorName>/Map.service.yml:
    template: Actor/Map.service.yml
  <ActorName>/MapInterface.php:
    template: Actor/MapInterface.php
  <ActorName>/Map/AwareTrait.php:
    template: Actor/Map/AwareTrait.php
  <ActorName>/Map/Factory.php:
    template: Actor/Map/Factory.php
  <ActorName>/Map/Factory.service.yml:
    template: Actor/Map/Factory.service.yml
  <ActorName>/Map/FactoryInterface.php:
    template: Actor/Map/FactoryInterface.php
  <ActorName>/Map/Factory/AwareTrait.php:
    template: Actor/Map/Factory/AwareTrait.php
  <ActorName>/Map/Builder.php:
    template: Actor/Map/Builder.php
  <ActorName>/Map/Builder.service.yml:
    template: Actor/Map/Builder.service.yml
  <ActorName>/Map/BuilderInterface.php:
    template: Actor/Map/BuilderInterface.php
  <ActorName>/Map/Builder/AwareTrait.php:
    template: Actor/Map/Builder/AwareTrait.php
  <ActorName>/Map/Builder/Factory.php:
    template: Actor/Map/Builder/Factory.php
  <ActorName>/Map/Builder/Factory.service.yml:
    template: Actor/Map/Builder/Factory.service.yml
  <ActorName>/Map/Builder/FactoryInterface.php:
    template: Actor/Map/Builder/FactoryInterface.php
  <ActorName>/Map/Builder/Factory/AwareTrait.php:
    template: Actor/Map/Builder/Factory/AwareTrait.php
```
```yml
# This lives in /PATH/TO/SOFTWARE_PRODUCT_ROOT/src/V2/Toe/Nail.buphalo.v1.fabrication.yml

# I only want SOME actors!
actors:
  <ActorName>.php:
    template: Actor.php
  <ActorName>.service.yml:
    template: Actor.service.yml
  <ActorName>Interface.php:
    template: ActorInterface.php
  <ActorName>/AwareTrait.php:
    template: Actor/AwareTrait.php
  <ActorName>/Factory.php:
    template: Actor/Factory.php
  <ActorName>/Factory.service.yml:
    template: Actor/Factory.service.yml
  <ActorName>/FactoryInterface.php:
    template: Actor/FactoryInterface.php
  <ActorName>/Factory/AwareTrait.php:
    template: Actor/Factory/AwareTrait.php
  <ActorName>/Builder.php:
    template: Actor/Builder.php
  <ActorName>/Builder.service.yml:
    template: Actor/Builder.service.yml
  <ActorName>/BuilderInterface.php:
    template: Actor/BuilderInterface.php
  <ActorName>/Builder/AwareTrait.php:
    template: Actor/Builder/AwareTrait.php
  <ActorName>/Builder/Factory.php:
    template: Actor/Builder/Factory.php
  <ActorName>/Builder/Factory.service.yml:
    template: Actor/Builder/Factory.service.yml
  <ActorName>/Builder/FactoryInterface.php:
    template: Actor/Builder/FactoryInterface.php
  <ActorName>/Builder/Factory/AwareTrait.php:
    template: Actor/Builder/Factory/AwareTrait.php
```

### Turning Off Fabrication Of An Actor
* Just don't include the Actor entry in the Fabrication File to begin with.
* Remove the Actor entry from the Fabrication File.
* Comment the Actor entry from the Fabrication File.

### Adding A New Or Updating An Existing Template
* Copy Buphalo's `template-tree` directory to your software product's root directory.
* Add or change the appropriate PHP and DI service definition YAML files in the position that you want them under your `template-tree/v1` directory.
* Be sure to update your environmental varaible to the following
```bash
Neighborhoods_Buphalo_V1_TemplateTree_Map_Builder_FactoryInterface__TemplateTreeDirectoryPaths=/PATH/TO/SOFTWARE_PRODUCT/ROOT/template-tree/v1 \
```

## Definitions

### Fabrication File
* A Fabrication File contains the instructions for fabricating a [Fablet](#fablet) for any arbitrary `<Object>`.
* The [Fablet](#fablet) `<Object>` is identified by the Fabrication File file name, and the location of the `Fabrication File` within the directory structure that it resides.
* In the [Example Fabrication Files](#example-fabrication-files) section one [Fablet](#fablet) `<Object>` is `Toe` and another [Fablet](#fablet) `<Object>` is `Toe\Nail`.
* A [Fablet](#fablet) `<Object>` can be any PHP object.

### Fablet
(credit [Mucha](https://github.com/pmucha-55places))
* A Fablet is the collection of Actors that are built from the Fabrication File for an `<Object>`.

## Features
* Only fabricates files that do not exist in `src`.

### Annotation Processors
* Annotation Processors allow user space to define dynamic template content before tokenization or compilation of the template.
* Annotation Processors are optional.
* Providing static context to the Annotation Processor is optional.
* If the `static_context_record` key is provided, it MUST resolve to a PHP `array`.
* Default annotation replacement is accomplished by using the contents of the annotation.
* Annotation Processors MUST implement `\Neighborhoods\Buphalo\AnnotationProcessorInterface`.
* Annotation Processors are not shared services.
```php
namespace Neighborhoods\Buphalo;

use Neighborhoods\Buphalo\AnnotationProcessor\ContextInterface;

interface AnnotationProcessorInterface
{
    public function setAnnotationProcessorContext(ContextInterface $Context);

    public function getAnnotationProcessorContext(): ContextInterface;

    public function getReplacement(): string;
}
```
* Currently, annotation processors have accesss to the static context, the annotation contents, and the Fabrication File by accessing the injected `\Neighborhoods\Buphalo\AnnotationProcessor\ContextInterface` object.

### Example Annotation Processors
* Annotation Processor Tag: `@neighborhoods-buphalo:annotation-processor`
* Annotation Processor Keys:
  * `Neighborhoods\Buphalo\Template\Actor\Builder.build1`
  * `Neighborhoods\Buphalo\Template\Actor\Builder.build2`
* The keys above are named according to a collision avoidance convention. However, there is no requirement on the key name except for uniqueness.
```php
// template-tree/V1/Actor/Builder.php
    public function build(): ActorInterface
    {
        $Actor = $this->getActorFactory()->create();
        /** @neighborhoods-buphalo:annotation-processor Neighborhoods\Buphalo\Actor\Builder.build1
         */
        /** @neighborhoods-buphalo:annotation-processor Neighborhoods\BuphaloTemplateTree\Actor\Builder.build2
        // @TODO - build the object.
        throw new \LogicException('Unimplemented build method.');
         */

        return $Actor;
    }
```
```yml
# src/V2/Toe.fabrication.yml
actors:
# ...
  <ActorName>/Builder.php:
    template: Actor/Builder.php
    annotation_processors:
      Neighborhoods\Buphalo\V1\Template\Actor\Builder.build1:
        processor_fqcn: \Neighborhoods\Buphalo\V1\AnnotationProcessor
      Neighborhoods\Buphalo\V1\Template\Actor\Builder.build2:
        processor_fqcn: \Neighborhoods\Buphalo\V1\AnnotationProcessor
        static_context_record:
          head: 'shoulders'
          knees: 'toes'
  <ActorName>/Builder.service.yml:
    template: Actor/Builder.service.yml
# ...
```
* If no annotation processors are defined then `\Neighborhoods\Buphalo\V1\AnnotationProcessor` is used and the above compiles as 
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

### Setting Up Git When Developing Buphalo As A Composer Dependency
* From your product root, and with Buphalo installed as a composer dependency
```bash
cd vendor/neighborhoods/buphalo && rm -rf .git && git clone git@github.com:neighborhoods/Buphalo.git && cp -R Buphalo/.git . && rm -rf Buphalo/ && cd ../../../
```
