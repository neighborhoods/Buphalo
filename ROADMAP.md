# Buphalo Roadmap / Future Features

Buphalo works. But there's still a lot to do to get it to where we want it.

## Feature List

These features are sorted roughly in order of user preference.

- [Fablet Context Records](#fablet-context-records)
- [Fablet Templates](#fablet-templates)
- [Running on a Subset of Files](#running-on-a-subset-of-files)
- [Customizable Tokenization and Compilation Rules](#customizable-tokenization-and-compilation-rules)
- [Supporting PHP Constants in YAML](#supporting-php-constants-in-yaml)
- [PhpStorm Integration](#phpstorm-integration)
- [Global Context Records](#global-context-records)
- [Template Creation Scripts](#template-creation-scripts)

## Feature Descriptions

### Fablet Context Records

Currently if you have different Annotation Processors that you want to have access to the same data
(e.g. field names and types that need to be passed to a Data Access Object, its Interface, Builder, and Repository),
that information must be passed to every Annotation Processor separately. This would allow you to specify a single
record outside of the `actors` key that would be passed to every Annotation Processor in the file.

JIRA: [BUPH-72](https://55places.atlassian.net/browse/BUPH-72)

### Fablet Templates

Currently the easiest way to duplicate a pattern is to copy a fablet file and then change any details (such as static
context records), but modifying that pattern then has to be done in multiple places, and it can be easy to miss that
something wasn't included when it should have been, etc. This would be an externally defined set of patterns that could
be referenced as a starting point in each fablet file.

JIRA: [BUPH-105](https://55places.atlassian.net/browse/BUPH-105)

### Running on a Subset of Files

Currently Buphalo doesn't distinguish between the root level directory that is uses to generate namespaces and the
directory it scans for files for. This can mean that when it runs it has to re-process every fabrication file in the
code-base, and when combined with other code-generation tools, such as Prefab, might take a while, especially when
running inside docker-for-mac. This would allow for separating the two so that you could tell Buphalo to run only on a
single directory or set of files, which may make iteration when creating templates and Annotation Processors faster.

JIRA: [BUPH-121](https://55places.atlassian.net/browse/BUPH-121)

### Customizable Tokenization and Compilation Rules

Currently the tokenization/compilation rules are hard-coded and not customizable. This would extract those rules into a
default set of rules that would be editable, but would also allow you to create your own rules. This would also be
customizable on a file-pattern basis (so different rules could be applied to different template file patterns, e.g. *
.php, *.service.yml, *.js, etc.)

JIRA: [BUPH-74](https://55places.atlassian.net/browse/BUPH-74)

### Supporting PHP Constants in YAML

Symfony allows the use of referencing php constants in yaml via `!php/const \Reference\To\Class::CONSTANT`. This would
allow something similar.

JIRA: [BUPH-98](https://55places.atlassian.net/browse/BUPH-98)

### PhpStorm Integration

Inspired by Symfony's PhpStorm plugin, this would be a plugin that would be aware of your templates and configuration
information and could have many smaller features including: being able to run buphalo for you, being able to navigate
from a fablet file actor to the generated file in your fabrication directory and vice versa, offering a "create fablet"
dialog with checkboxes for which templates to include, etc.

JIRA: [BUPH-67](https://55places.atlassian.net/browse/BUPH-67)

### Global Context Records

This takes the idea of Fablet Context Records above, and extends it to the entire execution run. Most likely this would
be a separate file referenced by an exec env var.

JIRA: [BUPH-129](https://55places.atlassian.net/browse/BUPH-129)

### Template Creation Scripts

Creating new templates can be either daunting or tedious depending on your experience level. It also requires an
in-depth knowledge of tokenization/compilation rules. One common way of doing so currently is to start with something
that you know works, copy it into the template directory, and then running a bunch of search/replace operations on it,
running buphalo to see how it'd actually look, and repeating until you get it right. This would be a script that would
look at a fabrication file and related existing files in src and attempt to create new templates, effectively handling
the copy/paste + search/replace process automatically. This would NOT handle the creation of Annotation Processors, but
should be able to read markers that define where an annotation should be.

JIRA: [BUPH-130](https://55places.atlassian.net/browse/BUPH-130)

## References
- [April 2021 Buphalo User Survey Results][202104 User Survey]

[202104 User Survey]: https://docs.google.com/spreadsheets/d/1FOIR74UGimvgNdJOYnIXeZ3YxvbaB05dDZ3Lbe-MXQ0/edit
