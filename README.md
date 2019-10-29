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
* [References](#references)

## Summary
This document attempts to describe how to use Buphalo's public APIs. In addition, it tries to offer some insight into the problem that Buphalo attempts to solve and the motivation for it to solve that problem. If it is not described in this document, it is not considered to be a public API and is subject to change in any arbitrary release, i.e. you should not depend on it.

## Problem
Patterns are solutions to problems within a context. Implementing well designed patterns can become tedious and laborious which discourages their implementation in favor of patterns that are less well designed but have a faster development velocity.

## Proposed Solution
Employ an easy to change code generation tool that generates well designed patterns so that the development velocity is equivalent or faster than less well designed patterns.

## Getting Started

### Running Buphalo
#### Environmental Variable API
It is very easy to trace through the code where an environment variable is used. Buphalo uses the environment feature of the [DI component](#references) to inject runtime options into objects in the container. 

Buphalo leverages an environment variable API for runtime options. The following shell command to run Buphalo illustrates the currently supported API.
```bash
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__SourceDirectoryPath=/PATH/TO/SOURCE/DIRECTORY \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__FabricationDirectoryPath=/PATH/TO/FABRICATION/DIRECTORY \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__NamespacePrefix=VENDOR\\PRODUCT\\ \
Neighborhoods_Buphalo_V1_TemplateTree_Map_Builder_FactoryInterface__TemplateTreeDirectoryPaths=/PATH/TO/TEMPLATE/TREE/DIRECTORY \
php bin/v1/buphalo
```

For example, in order to Buphalo Buphalo (assuming Buphalo is installed as a composer dependency) execute the following shell command from your product's root directory.
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

environment variable. As an env var this is "typed" as a CSV. It is then cast to an array by the [DI componnent](#references) and is eventually injected into the [Finder Component's](#references) `\Symfony\Component\Finder\Finder::name`. Any rule that works for `\Symfony\Component\Finder\Finder::name` will work here.
```bash
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__SourceDirectoryPath=$PWD/vendor/neighborhoods/buphalo/src/v1 \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__FabricationDirectoryPath=$PWD/vendor/neighborhoods/buphalo/fab/v1 \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__NamespacePrefix=Neighborhoods\\Buphalo\\ \
Neighborhoods_Buphalo_V1_TemplateTree_Map_Builder_FactoryInterface__TemplateTreeDirectoryPaths=$PWD/vendor/neighborhoods/buphalo/template-tree/V1 \
Neighborhoods_Buphalo_V1_FabricationFile_Map_BuilderInterface__FinderFileNames=Connection.buphalo.v1.fabrication.yml,Connection2.buphalo.v1.fabrication.yml 
php vendor/bin/v1/buphalo
```

### Example Fabrication Files

```yml
# This lives in /PATH/TO/SOFTWARE_PRODUCT_ROOT/src/V2/Toe.buphalo.v1.fabrication.yml

# I WANT ALL THE ACTORS!
actors:
  <PrimaryActorName>.php:
    template: PrimaryActorName.php
  <PrimaryActorName>.service.yml:
    template: PrimaryActorName.service.yml
  <PrimaryActorName>Interface.php:
    template: PrimaryActorNameInterface.php
  <PrimaryActorName>/AwareTrait.php:
    template: PrimaryActorName/AwareTrait.php
  <PrimaryActorName>/Factory.php:
    template: PrimaryActorName/Factory.php
  <PrimaryActorName>/Factory.service.yml:
    template: PrimaryActorName/Factory.service.yml
  <PrimaryActorName>/FactoryInterface.php:
    template: PrimaryActorName/FactoryInterface.php
  <PrimaryActorName>/Factory/AwareTrait.php:
    template: PrimaryActorName/Factory/AwareTrait.php
  <PrimaryActorName>/Builder.php:
    template: PrimaryActorName/Builder.php
  <PrimaryActorName>/Builder.service.yml:
    template: PrimaryActorName/Builder.service.yml
  <PrimaryActorName>/BuilderInterface.php:
    template: PrimaryActorName/BuilderInterface.php
  <PrimaryActorName>/Builder/AwareTrait.php:
    template: PrimaryActorName/Builder/AwareTrait.php
  <PrimaryActorName>/Builder/Factory.php:
    template: PrimaryActorName/Builder/Factory.php
  <PrimaryActorName>/Builder/Factory.service.yml:
    template: PrimaryActorName/Builder/Factory.service.yml
  <PrimaryActorName>/Builder/FactoryInterface.php:
    template: PrimaryActorName/Builder/FactoryInterface.php
  <PrimaryActorName>/Builder/Factory/AwareTrait.php:
    template: PrimaryActorName/Builder/Factory/AwareTrait.php
  <PrimaryActorName>/Repository.php:
    template: PrimaryActorName/Repository.php
  <PrimaryActorName>/Repository.service.yml:
    template: PrimaryActorName/Repository.service.yml
  <PrimaryActorName>/RepositoryInterface.php:
    template: PrimaryActorName/RepositoryInterface.php
  <PrimaryActorName>/Repository/AwareTrait.php:
    template: PrimaryActorName/Repository/AwareTrait.php
  <PrimaryActorName>/Map.php:
    template: PrimaryActorName/Map.php
  <PrimaryActorName>/Map.service.yml:
    template: PrimaryActorName/Map.service.yml
  <PrimaryActorName>/MapInterface.php:
    template: PrimaryActorName/MapInterface.php
  <PrimaryActorName>/Map/AwareTrait.php:
    template: PrimaryActorName/Map/AwareTrait.php
  <PrimaryActorName>/Map/Factory.php:
    template: PrimaryActorName/Map/Factory.php
  <PrimaryActorName>/Map/Factory.service.yml:
    template: PrimaryActorName/Map/Factory.service.yml
  <PrimaryActorName>/Map/FactoryInterface.php:
    template: PrimaryActorName/Map/FactoryInterface.php
  <PrimaryActorName>/Map/Factory/AwareTrait.php:
    template: PrimaryActorName/Map/Factory/AwareTrait.php
  <PrimaryActorName>/Map/Builder.php:
    template: PrimaryActorName/Map/Builder.php
  <PrimaryActorName>/Map/Builder.service.yml:
    template: PrimaryActorName/Map/Builder.service.yml
  <PrimaryActorName>/Map/BuilderInterface.php:
    template: PrimaryActorName/Map/BuilderInterface.php
  <PrimaryActorName>/Map/Builder/AwareTrait.php:
    template: PrimaryActorName/Map/Builder/AwareTrait.php
  <PrimaryActorName>/Map/Builder/Factory.php:
    template: PrimaryActorName/Map/Builder/Factory.php
  <PrimaryActorName>/Map/Builder/Factory.service.yml:
    template: PrimaryActorName/Map/Builder/Factory.service.yml
  <PrimaryActorName>/Map/Builder/FactoryInterface.php:
    template: PrimaryActorName/Map/Builder/FactoryInterface.php
  <PrimaryActorName>/Map/Builder/Factory/AwareTrait.php:
    template: PrimaryActorName/Map/Builder/Factory/AwareTrait.php
```
```yml
# This lives in /PATH/TO/SOFTWARE_PRODUCT_ROOT/src/V2/Toe/Nail.buphalo.v1.fabrication.yml

# I only want SOME actors!
actors:
  <PrimaryActorName>.php:
    template: PrimaryActorName.php
  <PrimaryActorName>.service.yml:
    template: PrimaryActorName.service.yml
  <PrimaryActorName>Interface.php:
    template: PrimaryActorNameInterface.php
  <PrimaryActorName>/AwareTrait.php:
    template: PrimaryActorName/AwareTrait.php
  <PrimaryActorName>/Factory.php:
    template: PrimaryActorName/Factory.php
  <PrimaryActorName>/Factory.service.yml:
    template: PrimaryActorName/Factory.service.yml
  <PrimaryActorName>/FactoryInterface.php:
    template: PrimaryActorName/FactoryInterface.php
  <PrimaryActorName>/Factory/AwareTrait.php:
    template: PrimaryActorName/Factory/AwareTrait.php
  <PrimaryActorName>/Builder.php:
    template: PrimaryActorName/Builder.php
  <PrimaryActorName>/Builder.service.yml:
    template: PrimaryActorName/Builder.service.yml
  <PrimaryActorName>/BuilderInterface.php:
    template: PrimaryActorName/BuilderInterface.php
  <PrimaryActorName>/Builder/AwareTrait.php:
    template: PrimaryActorName/Builder/AwareTrait.php
  <PrimaryActorName>/Builder/Factory.php:
    template: PrimaryActorName/Builder/Factory.php
  <PrimaryActorName>/Builder/Factory.service.yml:
    template: PrimaryActorName/Builder/Factory.service.yml
  <PrimaryActorName>/Builder/FactoryInterface.php:
    template: PrimaryActorName/Builder/FactoryInterface.php
  <PrimaryActorName>/Builder/Factory/AwareTrait.php:
    template: PrimaryActorName/Builder/Factory/AwareTrait.php
```

### Turning Off Fabrication Of An Actor
* Just don't include the Actor entry in the Fabrication File to begin with.
* Remove the Actor entry from the Fabrication File.
* Comment the Actor entry from the Fabrication File.
* Include the equivalent file in the path referenced by `Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__SourceDirectoryPath`
  * Buphalo will not fabricate files that already exist in the source directory path, since the idea is that they will be preferred over the fabricated files.

### Adding A New Or Updating An Existing Template
* Copy Buphalo's `template-tree` directory to your software product's root directory if you have not done so already.
* Add or change the appropriate PHP and dependency injection service definition YAML files in the position that you want them under your `template-tree/v1` directory.
* Be sure to update your environmental varaible to the following (or the equivalent if you used a different path for the copied directory)
```bash
Neighborhoods_Buphalo_V1_TemplateTree_Map_Builder_FactoryInterface__TemplateTreeDirectoryPaths=/PATH/TO/SOFTWARE_PRODUCT/ROOT/template-tree/v1 \
```

## Definitions

### Fabrication File
* A Fabrication File contains the instructions for fabricating a [Fablet](#fablet).
* The [Fablet](#fablet) primary Actor is identified by the Fabrication File file name, and the location of the `Fabrication File` within the directory structure that it resides.
* The `<PrimaryActorName>` token is an alias to the Fabrication File name without the extension and is the name of the primary actor.
* In the [Example Fabrication Files](#example-fabrication-files) section one [Fablet](#fablet) is `Toe` and the other [Fablet](#fablet) is `Toe\Nail`.
* A [Fablet](#fablet) Actor can be anything.

### Fablet
(credit [Mucha](https://github.com/pmucha-55places))
* A Fablet is the collection of Actors that are built from the Fabrication File.
* A Primary Actor is the class that shares the same name as the Fabrication File without the extension.
* This collection contains the Primary Actor and/or any number of supporting actors.

## Features
### Autoloading
* Be sure to update your `composer.json` to fallback to a `fab` directory, e.g.
    ```json
    "autoload": {
    "psr-4": {
      "VENDOR\\PRODUCT\\": [
        "src",
        "fab"
      ]
    }
  }
  ```
* In order to be efficient, Buphalo will only fabricate files that do not exist in `src` since anything in `src` will override what exists in `fab`.

### Annotation Processors
* Annotation Processors allow user space to define dynamic template content before tokenization or compilation of the template.
* Annotation Processors are optional.
* Providing static context to the Annotation Processor is optional.
* If the `static_context_record` key is provided, it MUST resolve to a PHP `array`.
* Default annotation replacement is accomplished by using the contents of the annotation.
* Annotation Processors MUST implement `\Neighborhoods\Buphalo\V1\AnnotationProcessorInterface`.
* Annotation Processors are not shared services.
```php
namespace Neighborhoods\Buphalo\V1;

use Neighborhoods\Buphalo\V1\AnnotationProcessor\ContextInterface;

interface AnnotationProcessorInterface
{
    public function setAnnotationProcessorContext(ContextInterface $Context);

    public function getAnnotationProcessorContext(): ContextInterface;

    public function getReplacement(): string;
}
```
* Currently, annotation processors have access to the static context, the annotation contents, and the Fabrication File by accessing the injected `\Neighborhoods\Buphalo\V1\AnnotationProcessor\ContextInterface` object.

### Example Annotation Processors
* Annotation Processor Tag: `@neighborhoods-buphalo:annotation-processor`
* Annotation Processor Keys:
  * `Neighborhoods\BuphaloTemplateTree\PrimaryActorName\Builder.build1`
  * `Neighborhoods\BuphaloTemplateTree\PrimaryActorName\Actor\Builder.build2`
* The keys above are named according to a collision avoidance convention. However, there is no requirement on the key name except for uniqueness.
```php
// template-tree/V1/PrimaryActorName/Builder.php
    public function build(): PrimaryActorNameInterface
    {
        $PrimaryActorName = $this->getPrimaryActorNameFactory()->create();
        /** @neighborhoods-buphalo:annotation-processor Neighborhoods\BuphaloTemplateTree\PrimaryActorName\Builder.build1
         */
        /** @neighborhoods-buphalo:annotation-processor Neighborhoods\BuphaloTemplateTree\PrimaryActorName\Builder.build2
        // @TODO - build the object.
        throw new \LogicException('Unimplemented build method.');
         */

        return $PrimaryActorName;
    }
```
```yml
# src/V2/Toe.fabrication.yml
actors:
# ...
  <PrimaryActorName>/Builder.php:
    template: PrimaryActorName/Builder.php
    annotation_processors:
      Neighborhoods\BuphaloTemplateTree\PrimaryActorName\Builder.build1:
        processor_fqcn: \Neighborhoods\Buphalo\V1\AnnotationProcessor
      Neighborhoods\BuphaloTemplateTree\PrimaryActorName\Builder.build2:
        processor_fqcn: \Neighborhoods\Buphalo\V1\AnnotationProcessor
        static_context_record:
          head: 'shoulders'
          knees: 'toes'
  <PrimaryActorName>/Builder.service.yml:
    template: PrimaryActorName/Builder.service.yml
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

## References
* [Symfony Finder Component](https://symfony.com/doc/current/components/finder.html)
* [Symfony Dependency Injection Component](https://symfony.com/doc/current/components/dependency_injection.html)
