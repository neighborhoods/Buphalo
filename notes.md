# TODO
## Model Actor and Supporting Actors
* Refactor FabricationFile Actors to FabricationFile Supporting Actors.
* Create FabricationFile Actor.
* Refactor Actor to SupportingActor.
* Repurpose Actor to represent (the primary) Actor.
* Create a FabricationFile Actor in order to Interface a generic Actor and re-use it's builders.
* Create a Phar Builder.
* Output fabrication report.
* Replace Protean Container Builder with Neighborhoods Container Builder.

# Notes

## Properties of GenericActorInterface

### Relative Class Path
The Class Path of the actor without the namespace.

### Parent Relative Class Path
The Class Path of the parent node of the actor without the namespace.

### Namespace
The Namespace that the actor is in.

### Full Pascal Case Name
The Relative Class Path without backslashes.

### Short Pascal Case Name
The name of the class.

### Source Directory Path
The source directory where the compiled actor is located without a trailing slash.

### Source File Path
The source file path where the compiled actor is located.

### Fabrication Directory Path
The fabrication directory where the compiled actor is located without a trailing slash.

### Fabrication File Path
The fabrication file path where the compiled actor is located.

## Properties of an Actor

### Fabrication File Actor
An Actor has all of the properties of GenericActorInterface with the following additional properties.

## Properties of a Supporting Actor
A Supporting Actor has all of the properties of a GenericActorInterface with the following additional properties.

### Actor
The Actor that this Supporting Actor relates to.

### Fabrication File Supporting Actor
The Fabrication File Supporting Actor that this Supporting Actor relates to.

## Assumptions
Bradfab makes the following assumptions. If an assumption is not within this inventory either Bradfab makes no assumption or the assumption yet needs to be documented.

### Motivation
The reason that these assumptions exist are to focus on a working code generation tool instead of style preference. The only reason that any assumption is made is to that end. Bradfab does not aim to enforce a style guide in the slightest. It aims to make as few assumptions as possible to work without spending what is thought to be an expensive amount of effort to adhere to a style guide.

In the future it may be possible to additionally apply a style guide to Bradfab through a DSL.

### Naming 
#### [PascalCase](https://chaseonsoftware.com/most-common-programming-case-types/#pascalcase)
* Class names
* Class properties
* File names
* Method arguments

#### [CamelCase](https://chaseonsoftware.com/most-common-programming-case-types/#camelcase)
* Method names
* Variable names

### Organization

## Token Nomenclature
* **FQSEN** - Fully Qualified Structural Element. [Examples](https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc-tags.md#examples-10)

```
\Neighborhoods\Bradfab\Template\Actor\Map\Builder\Factory
 |-----namespace-----|-|----qn1-----|-|------qn2--------|
 |-----namespace-----|-|------------qn3-----------------|
 |--------------------relative name---------------------|
|----------------------fqcn-----------------------------|
```



### Primary Actor
* qn1: target primary actor name path

### Supporting Actor
* qn2: target supporting actor relative name path
* qn3: target supporting actor absolute path
