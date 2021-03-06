# General Purpose Annotation Processors
Buphalo provides a number of out-of-the box General Purpose Annotation Processors.

Each General Purpose Annotation Processor listed below has a number of similar qualities:
- Description: A brief description of the Annotation Processor's behavior
- FQCN: The fully qualified class name to use in the `processor_fqcn` field in the [fabrication file][Fabrication File]
- Contract: The expected format of the `static_context_record` field in the [fabrication file][Fabrication File]
- Example: An example template with annotation, fabrication file snippet, and the value after replacement

## Simple String Replacement

**Description:** Replaces the annotation with a specified `string`

**FQCN:** `\Neighborhoods\Buphalo\V1\AnnotationProcessors\SimpleString`

**Contract:** A single object with a `string` key.

**Example:**
```php
/** @neighborhoods-buphalo:annotation-processor annotation1
*/
```
```yaml
annotation1:
  processor_fqcn: \Neighborhoods\Buphalo\V1\AnnotationProcessors\SimpleString
  static_context_record:
    string: 'this is a string'
```
```
this is a string
```

## Empty String Replacement

**Description:** Removes the annotation. Useful for when you do not want to include the Default Contents

**FQCN:** `\Neighborhoods\Buphalo\V1\AnnotationProcessors\EmptyString`

**Contract:** None

**Example:**
```php
Before
/** @neighborhoods-buphalo:annotation-processor annotation1
Default Content
*/
After
```
```yaml
annotation1:
  processor_fqcn: \Neighborhoods\Buphalo\V1\AnnotationProcessors\EmptyString
```
```php
Before

After
```

## Symfony Expression Language
**Description:** Uses [Symfony Expression Language][Symfony EL] to generate the replacement.
Includes access to the `AnnotationProcessorContext` under the `context` alias.
  
**FQCN:** `\Neighborhoods\Buphalo\V1\AnnotationProcessors\SymfonyExpression`

**Contract:** A single object with an `expression` key.
May include other keys used by the expression.
Other keys can be accessed via `context.getStaticContextRecord()["key"]`

**Example:**
```php
/** @neighborhoods-buphalo:annotation-processor annotation1
*/
```
```yaml
# Expression.buphalo.v1.fabrication.yml
annotation1:
  processor_fqcn: \Neighborhoods\Buphalo\V1\AnnotationProcessors\SymfonyExpression
  static_context_record:
    expression: 'context.getFabricationFile().getFileName() ~ " " ~ context.getStaticContextRecord()["word"]'
    word: 'Language'
```
```php
Expression Language
```

## References
- [Annotation Processors][Annotation Processors]

[Annotation Processors]: AnnotationProcessors.md
[Fabrication File]: AnnotationProcessors.md#fabrication-file-definitions
[Symfony EL]: https://symfony.com/doc/current/components/expression_language.html
