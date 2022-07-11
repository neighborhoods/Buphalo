# Upgrading

To encourage early adoption, and at-will migration, Buphalo V2 can run alongside Buphalo V1 without issue.
This allows users to start using Buphalo V2 immediately and to upgrade their V1 patterns gradually.

## Execution
- Duplicate your template directory to support V2 templates
  - _N.B._ If you are using Buphalo's template directory (intended for Buphalo's internal use only),
    you should first create a copy of it as your own template directory before upgrading to V2.
  - See [Upgrading Templates](#upgrading-templates) below when it's time to convert old fablets or create new ones.
- Create a duplicate fabrication script from whatever is being used for V1 as what is being used for V2.
  - Update the execution variables to their V2 versions.
- Update the original fabrication script to point to the older buphalo executable
  (`/vendor/neighborhoods/buphalo/bin/v1/buphalo`)

## Templates
The most notable breaking change between Buphalo V1 and V2 is in [Tokenization and Compliation][t-and-c].
Buphalo V1 used a complex series of replacements that often behaved differently in different contexts.
Buphalo V2 attempts to simplify those while still providing the same net functionality.

To summarize:
- There are now 4 primary tokens that are used:
  - `Neighborhoods\BuphaloTemplateTree` no longer includes the relative namespace
  - `\RelativeNamespace` should be used when you want the relative path above the Primary Actor
  - `PrimaryActorName` should be used when you only want the short reference to the actor
  - `NamespacedPrimaryActorName` should now be used when you want the long version

### Upgrading Templates
After duplicating your V1 template tree, you'll need to update the new templates to use Buphalo V2's tokenization rules.
The following replacements will _probably_ get you most of the way there. Some other adjustments may be necessary.
(Depending on what methods you use, be sure to properly escape the `\` and `$` characters.)

| Search                               | Replace                                               |
|--------------------------------------|-------------------------------------------------------|
| `Neighborhoods\BuphaloTemplateTree`  | `Neighborhoods\BuphaloTemplateTree\RelativeNamespace` |
| `setPrimaryActorName`                | `setNamespacedPrimaryActorName`                       |
| `getPrimaryActorName`                | `getNamespacedPrimaryActorName`                       |
| `hasPrimaryActorName`                | `hasNamespacedPrimaryActorName`                       |
| `->PrimaryActorName`                 | `->NamespacedPrimaryActorName`                        |
| `LogicException('PrimaryActorName`   | `LogicException('NamespacedPrimaryActorName`          |
| `protected $PrimaryActorName`        | `protected $NamespacedPrimaryActorName`               |

_n.b._ `protected` above is because a previous Buphalo rule had hardcoded replacements,
and replacing equivalent occurrences of `private`/`public` are probably not necessary.

## File Extensions

After updating the fabrication scripts to support both V1 and V2,
you should be able to run it and have V1 execute normally, with V2 finding no files.

- Buphalo V1 uses `.buphalo.v1.fabrication.yml`
- Buphalo V2 uses `.buphalo.v2.fabrication.yml`

To use Buphalo V2 for something new, make sure you use the Buphalo V2 extension

To upgrade a file, it's recommended that you:
- Run your fabrication scripts (_e.g._ `composer prebake`, `bin/fab/buphalo.sh`, etc.)
- Create a backup of your `fab/` directory (_e.g._`mv fab fab-bak`)
- Change the extension of the file
  (_e.g._ `mv src/Directory/Actor.buphalo.{v1,v2}.fabrication.yml`)
- Rerun the fabrication script
- Perform a diff between the backup and the new `fab/` directory (_e.g._ `diff -r fab-bak fab`)


## Backwards Incompatible Changes
- See [Templates](#templates) above 
 
## References
[t-and-c]: ./TokenizationAndCompilation.md
- [Tokenization and Compilation][t-and-c]
