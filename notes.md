# TODO
## Model Actor and Supporting Actors
* Refactor FabricationFile Actors to FabricationFile Supporting Actors.
* Create FabricationFile Actor.
* Refactor Actor to TargetSupportingActor.
* Repurpose Actor to represent the .
* Create a FabricationFile Actor in order to Interface a generic Actor and re-use it's builders.
* Create a Phar Builder.
* Output fabrication report.
* Replace Protean Container Builder with Neighborhoods Container Builder.

# Notes
## Properties of an Actor
### Relative Parent Class Path
The Class Path of the parent node of the actor without the namespace.

### Relative Class Path
The Class Path of the actor without the namespace.

### Namespace
The Namespace that the actor is in.

### Full Pascal Case Name
The Relative Class Path without backslashes.

### Short Pascal Case Name
The name of the class.

### Source Directory Path
The source directory where the compiled actor is located without the trailing slash.

### Source File Path
The source file path where the compiled actor is located.

### Fabrication Directory Path
The fabrication directory where the compiled actor is located without the trailing slash.

### Fabrication File Path
The fabrication file path where the compiled actor is located.

## Assumptions
Bradfab makes the following assumptions. If an assumption is not within this inventory either Bradfab makes no assumption or the assumption yet needs to be documented.

### Motivation
The reason that these assumptions exist are to focus on a working code generation tool instead of style preference. The only reason that any assumption is made is to that end. Bradfab does not aim to enforce a style guide in the slightest. It aims to make as few assumptions as possible to work without spending what is thought to be an expensive amount of effort to adhere to a style guide.

In the future it may be possible to additionally apply a style guide to Bradfab through a DSL.

### Naming 
#### [PascalCase](https://chaseonsoftware.com/most-common-programming-case-types/#pascalcase).
* Class names
* Class properties
* File names


### Organization

## Token Nomenclature
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
