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


|Search String|Replacement|
|---|---|
|`Neighborhoods\BuphaloTemplateTree`|`**TOKEN_NAMESPACE_PREFIX**`|
|`\RelativeNamespace`|`**TOKEN_NAMESPACE_RELATIVE**`|
|`NamespacedPrimaryActorName`|`**TOKEN_PRIMARY_ACTOR_NAME_FULL_PASCAL**`|
|`PrimaryActorName`|`**TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL**`|

### Details Compared to V1

Old Template: `namespace Neighborhoods\BuphaloTemplateTree\PrimaryActorName`
Old Replacement: `namespace **NAMESPACE_PREFIX_TOKEN****NAMESPACE_RELATIVE_TOKEN**\**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: `namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName`
New Replacement: `namespace **TOKEN_NAMESPACE_PREFIX****TOKEN_NAMESPACE_RELATIVE**\**TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL**`

Old Template: `namespace Neighborhoods\BuphaloTemplateTree`
Old Replacement: `namespace **NAMESPACE_PREFIX_TOKEN****NAMESPACE_RELATIVE_TOKEN**`
New Template: `namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace`
New Replacement: `namespace **TOKEN_NAMESPACE_PREFIX****TOKEN_NAMESPACE_RELATIVE**`

Old Template: `use Neighborhoods\BuphaloTemplateTree\PrimaryActorName`
Old Replacement: `use **NAMESPACE_PREFIX_TOKEN****NAMESPACE_RELATIVE_TOKEN**\**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: `use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName`
New Replacement: `use **TOKEN_NAMESPACE_PREFIX****TOKEN_NAMESPACE_RELATIVE**\**TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL**`

Old Template: `use Neighborhoods\BuphaloTemplateTree`
Old Replacement: `use **NAMESPACE_PREFIX_TOKEN**`
New Template: `use Neighborhoods\BuphaloTemplateTree`
New Replacement: `use **TOKEN_NAMESPACE_PREFIX**`

Old Template: `services:\n  Neighborhoods\BuphaloTemplateTree\PrimaryActorName`
Old Replacement: `services:\n  **NAMESPACE_PREFIX_TOKEN****NAMESPACE_RELATIVE_TOKEN**\**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: `services:\n  Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName`
New Replacement: `services: **TOKEN_NAMESPACE_PREFIX****TOKEN_NAMESPACE_RELATIVE**\**TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL**`

Old Template: `class: Neighborhoods\BuphaloTemplateTree\PrimaryActorName`
Old Replacement: `class: **NAMESPACE_PREFIX_TOKEN****NAMESPACE_RELATIVE_TOKEN**\**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: `class: Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName`
New Replacement: `class: **TOKEN_NAMESPACE_PREFIX****TOKEN_NAMESPACE_RELATIVE**\**TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL**`

Old Template: `['@Neighborhoods\BuphaloTemplateTree\PrimaryActorName`
Old Replacement: `['@**NAMESPACE_PREFIX_TOKEN****NAMESPACE_RELATIVE_TOKEN**\**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: `['@Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName`
New Replacement: `['@**TOKEN_NAMESPACE_PREFIX****TOKEN_NAMESPACE_RELATIVE**\**TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL**`

Old Template: `\PrimaryActorName;`
Old Replacement: `**EMPTY_TOKEN**;`
New Template: Not Applicable
New Replacement: Not Applicable

Old Template: `\{Template File Name};`
Old Replacement: `**EMPTY_TOKEN**;`
New Template: Not Applicable
New Replacement: Not Applicable

Old Template: `\PrimaryActorNameInterface`
Old Replacement: `\**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**Interface`
New Template: `\PrimaryActorNameInterface`
New Replacement: `\**TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL**Interface`

Old Template: `\{Template File Name}Interface`
Old Replacement: `\**SHORT_PASCAL_CASE_NAME_TOKEN**Interface`
New Template: Not Applicable
New Replacement: Not Applicable

Old Template: `\PrimaryActorName\`
Old Replacement: `**EMPTY_TOKEN**\`
New Template: Not Applicable
New Replacement: Not Applicable

Old Template: `\PrimaryActorName`
Old Replacement: `\**RELATIVE_CLASS_PATH_TOKEN**`
New Template: TODO
New Replacement:TODO

Old Template: `\{Template File Name}`
Old Replacement: `\**SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: Not Applicable
New Replacement: Not Applicable

Old Template: `protected $PrimaryActorName`
Old Replacement: `protected $**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**`
New Template: `protected $NamespacedPrimaryActorName`
New Replacement: `protected $**TOKEN_PRIMARY_ACTOR_NAME_FULL_PASCAL**`

Old Template: `protected ${Template File Name}`
Old Replacement: `protected $**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**`
New Template: Not Applicable
New Replacement: Not Applicable

Old Template: `$this->PrimaryActorName`
Old Replacement: `$this->**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**`
New Template: `$this->NamespacedPrimaryActorName`
New Replacement: `$this->**TOKEN_PRIMARY_ACTOR_NAME_FULL_PASCAL**`

Old Template: `$this->{Template File Name}`
Old Replacement: `$this->**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**`
New Template: Not Applicable
New Replacement: Not Applicable

Old Template: `class PrimaryActorName`
Old Replacement: `class **PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: `class PrimaryActorName`
New Replacement: `class **TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL**`

Old Template: `class(\s+){Template File Name}`
Old Replacement: `class **SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: Not Applicable
New Replacement: Not Applicable

Old Template: `$PrimaryActorName`
Old Replacement: `$**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: `$PrimaryActorName`
New Replacement: `$**TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL**`

Old Template: `${Template File Name}`
Old Replacement: `$**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: Not Applicable
New Replacement: Not Applicable

Old Template: `interface PrimaryActorNameInterface`
Old Replacement: `interface **PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**Interface`
New Template: `interface PrimaryActorNameInterface`
New Replacement: `interface **TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL**Interface`

Old Template: `interface(\s+){Template File Name}`
Old Replacement: `interface **SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: Not Applicable
New Replacement: Not Applicable

Old Template: `PrimaryActorNameInterface`
Old Replacement: `**PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**Interface`
New Template: `PrimaryActorNameInterface`
New Replacement: `**TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL**Interface`

Old Template: `{Template File Name}Interface`
Old Replacement: `**SHORT_PASCAL_CASE_NAME_TOKEN**Interface`
New Template: Not Applicable
New Replacement: Not Applicable

Old Template: `use PrimaryActorName`
Old Replacement: `use **PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: `use PrimaryActorName`
New Replacement: `use **TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL**`

Old Template: `use(\s+){Template File Name}`
Old Replacement: `use **PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: Not Applicable
New Replacement: Not Applicable

Old Template: `{Actor Short Pascal Case Name}`
Old Replacement: `**SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: Not Applicable
New Replacement: Not Applicable

Old Template: `PrimaryActorName\n`
Old Replacement: `**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**\n`
New Template: `NamespacedPrimaryActorName\n`
New Replacement: `**TOKEN_PRIMARY_ACTOR_NAME_FULL_PASCAL**\n`

Old Template: `{Template File Name}\n`
Old Replacement: `**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**\n`
New Template: Not Applicable
New Replacement: Not Applicable

Old Template: `PrimaryActorName`
Old Replacement: `**PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN**`
New Template: `NamespacedPrimaryActorName`
New Replacement: `**TOKEN_PRIMARY_ACTOR_NAME_FULL_PASCAL**`

Old Template: `{Template File Name}`
Old Replacement: `**SHORT_PASCAL_CASE_NAME_TOKEN**`
New Template: Not Applicable
New Replacement: Not Applicable

## Compilation
The compiler replaces each token with a dynamic string as follows:

|Token|Actor Method|Example|Notes|
|---|---|---|---|
|`**TOKEN_NAMESPACE_PREFIX**`|`getNamespacePrefix()`|`Neighborhoods\BuphaloFitness\Demo3`|
|`**TOKEN_NAMESPACE_RELATIVE**`|`getNamespaceRelative()`|`\DOR\V1`|
|`**TOKEN_PRIMARY_ACTOR_NAME_FULL_PASCAL**`|`getPrimaryActorNameFullPascalCase()`|`DORV1Car`|
|`**TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL**`|`getPrimaryActorNameShortPascalCase()`|`Car`|
|`**TOKEN_ACTOR_NAME_SHORT_PASCAL**`|`getActorNameShortPascalCase()`|`Factory`|Unused<sup>1</sup>|
|`**TOKEN_ACTOR_NAME_RELATIVE_PASCAL**`|`getActorNameRelativePascalCase()`|`CarBuilderFactory`|Unused<sup>1</sup>|
|`**TOKEN_ACTOR_NAME_FULL_PASCAL**`|`getActorNameFullPascalCase()`|`DORV1CarBuilderFactory`|Unused<sup>1</sup>|
|`**TOKEN_CLASS_PATH_RELATIVE**`|`getClassPathRelative()`|`Car\Builder\Factory`|Unused<sup>2</sup>|
|`**TOKEN_EMPTY**`|||Unused<sup>2</sup>|

Some tokens are currently unused, by the base level conversion, but may stick around if a use-case arises.
They are called out above with reasoning elaborated here:

1. Unused because matching the Actor Name was only ever used by things that searched for the Template File Name.
   This was originally implemented so that you could have `Actor.php` reference a `SpecialActor.php` file,
   and in that file, have references to `SpecialActor` replaced by `Actor`.
   This is really only necessary if template designers strictly require class names to match file names,
   which is much more opinionated than Buphalo's default templating engine needs to be.
   In Buphalo V2, that should just be done by having `SpecialActor.php` use `Actor` references.
2. This was only used originally in weird edge cases, that we'll be trying to remove.

### Summary Compared to V1
- Token names have been adjusted for consistency
- "Relative" non-primary actor name renamed from "Full".
- "Full" non-primary actor name created that is relative to the namespace prefix instead of the primary actor.
- Empty Token should no longer be used.


## Effective Results
TODO

## What Each Token Replaces
TODO

## References
[APs]: ../V1/AnnotationProcessors.md
