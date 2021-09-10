# Tokenization and Compilation
This document summarizes the tokenization and compilation process that is at the core of
Buphalo's algorithm to convert a template into a new file.

## Process Overview
For each `actor` in a `fablet`, Buphalo performs the following:
1. Runs Annotation Processors to replace Annotations
   - Annotation Processors may replace their annotation with text that includes:
      - Text that will get replaced by a token according to the tokenization rules
      - A token that will get replaced during compilation
      - Text that won't be modified by tokenization/compilation
2. Replaces pre-defined strings with Tokens (Tokenization)
3. Replaces each Token with a new string based on the file (Compilation)

## Annotation Processors
See [Annotation Processors][APs].

## Example Values
Examples derived based on the single actor in the following file when the
`Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__NamespacePrefix` env variable is set to
`Neighborhoods\BuphaloFitness\Demo3`.

```yml
# src/DOR/V1/Car.buphalo.v1.fabrication.yml
<PrimaryActorName>/Builder/Factory.php
  template: PrimaryActorName/Builder/SpecialFactory.php
```

## Tokenization
Note that in the Regex/String column, {} represents a dynamic string:
* {Template File Name}:
  Represents a call to `$this->getActorTemplate()->getFabricationFileActor()->getTemplateFileName()`
  e.g. `SpecialFactory` 
* {Actor Short Pascal Case Name}:
  Represents a call to `$this->getActor()->getShortPascalCaseName()`
  e.g. `Factory`

|Type|Regex/String|Replacement|
|---|---|---|
|Regex|`namespace(\s+)Neighborhoods\\BuphaloTemplateTree\\PrimaryActorName`|`namespace **NAMESPACE_PREFIX_TOKEN****NAMESPACE_RELATIVE_TOKEN**\**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`|
|Regex|`namespace(\s+)Neighborhoods\\BuphaloTemplateTree`|`namespace **NAMESPACE_PREFIX_TOKEN****NAMESPACE_RELATIVE_TOKEN**`|
|Regex|`use(\s+)Neighborhoods\\BuphaloTemplateTree\\PrimaryActorName`|`use **NAMESPACE_PREFIX_TOKEN****NAMESPACE_RELATIVE_TOKEN**\**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`|
|Regex|`use(\s+)Neighborhoods\\BuphaloTemplateTree`|`use **NAMESPACE_PREFIX_TOKEN**`|
|Regex|`services:\n(\s+)Neighborhoods\\BuphaloTemplateTree\\PrimaryActorName`|`services:\n  **NAMESPACE_PREFIX_TOKEN****NAMESPACE_RELATIVE_TOKEN**\**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`|
|Regex|`class:(\s+)Neighborhoods\\BuphaloTemplateTree\\PrimaryActorName`|`class: **NAMESPACE_PREFIX_TOKEN****NAMESPACE_RELATIVE_TOKEN**\**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`|
|String|`['@Neighborhoods\BuphaloTemplateTree\PrimaryActorName`|`['@**NAMESPACE_PREFIX_TOKEN****NAMESPACE_RELATIVE_TOKEN**\**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`|
|String|`\PrimaryActorName;`|`**EMPTY_TOKEN**;`|
|String|`\{Template File Name};`|`**EMPTY_TOKEN**;`|
|String|`\PrimaryActorNameInterface`|`\**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**Interface`|
|String|`\{Template File Name}Interface`|`\**SHORT_PASCAL_CASE_NAME_TOKEN**Interface`|
|String|`\PrimaryActorName\`|`**EMPTY_TOKEN**\`|
|String|`\PrimaryActorName`|`\**RELATIVE_CLASS_PATH_TOKEN**`|
|String|`\{Template File Name}`|`\**SHORT_PASCAL_CASE_NAME_TOKEN**`|
|Regex|`protected(\s+)\$PrimaryActorName`|`protected $**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**`|
|Regex|`protected(\s+)\${Template File Name}`|`protected $**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**`|
|String|`$this->PrimaryActorName`|`$this->**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**`|
|String|`$this->{Template File Name}`|`$this->**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**`|
|Regex|`class(\s+)PrimaryActorName`|`class **PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`|
|Regex|`class(\s+){Template File Name}`|`class **SHORT_PASCAL_CASE_NAME_TOKEN**`|
|String|`$PrimaryActorName`|`$**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`|
|String|`${Template File Name}`|`$**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`|
|Regex|`interface(\s+)PrimaryActorNameInterface`|`interface **PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**Interface`|
|Regex|`interface(\s+){Template File Name}`|`interface **SHORT_PASCAL_CASE_NAME_TOKEN**`|
|String|`PrimaryActorNameInterface`|`**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**Interface`|
|String|`{Template File Name}Interface`|`**SHORT_PASCAL_CASE_NAME_TOKEN**Interface`|
|Regex|`use(\s+)PrimaryActorName`|`use **PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`|
|Regex|`use(\s+){Template File Name}`|`use **PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`|
|String|`{Actor Short Pascal Case Name}`|`**SHORT_PASCAL_CASE_NAME_TOKEN**`|
|String|`PrimaryActorName\n`|`**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**\n`|
|String|`{Template File Name}\n`|`**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**\n`|
|String|`PrimaryActorName`|`**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**`|
|String|`{Template File Name}`|`**SHORT_PASCAL_CASE_NAME_TOKEN**`|

## Compilation
The compiler replaces each token with a dynamic string as follows:

|Token|Actor Method|Example|Notes|
|---|---|---|---|
|`**SHORT_PASCAL_CASE_NAME_TOKEN**`|`getShortPascalCaseName()`|`Factory`|Only used to replace things that match Actor/Filename, which is redundant|
|`**FULL_PASCAL_CASE_NAME_TOKEN**`|`getFullPascalCaseName()`|`CarBuilderFactory`|Unused|
|`**RELATIVE_CLASS_PATH_TOKEN**`|`getRelativeClassPath()`|`Car\Builder\Factory`|Only used in one very odd case|
|`**NAMESPACE_PREFIX_TOKEN**`|`getNamespacePrefix()`|`Neighborhoods\BuphaloFitness\Demo3`||
|`**NAMESPACE_RELATIVE_TOKEN**`|`getNamespaceRelative()`|`\DOR\V1`||
|`**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**`|`getPrimaryActorFullPascalCaseName()`|`DORV1Car`||
|`**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`|`getPrimaryActorShortPascalCaseName()`|`Car`||
|`**EMPTY_TOKEN**`|||]()


## Effective Results
TODO

## What Each Token Replaces
TODO

## References
[APs]: ./AnnotationProcessors.md
