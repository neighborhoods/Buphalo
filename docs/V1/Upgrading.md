# Upgrading from Bradfab

Buphalo is designed to be run in place of, or if necessary, in addition to, Bradfab.
This should allow you to upgrade specific files as desired in case there are issues during the Release Candidate phase.

## Steps to Upgrade

- Copy whatever directory you are using for Bradfab templates into a new directory for Buphalo
  - This might be `/vendor/neighborhoods/bradfab/src/Template/`.
    If so, and you decide to just use the `vendor/neighborhoods/buphalo/template-tree/` directory, we make no
    guarantees about things working the same as these may be different template files.
    As such, we recommend maintaining your own template directory where it'll be easier to include your own templates
    as you find the need for them.
 
- Do a search/replace to change all occurences of `Neighborhoods\Bradfab\Template` in your new template directory to
  `Neighborhoods\BuphaloTemplateTree`
- Replace all `Actor` references with `PrimaryActorName`, including moving files/directories.
  
- Run `vendor/bin/upgrade bradfab <directory>`
  - Where `<directory>` is the top level directory of all of your current `.fabrication.yml` files
    (probably `src`, unless you are doing a partial transition).
  - This script will create new `.buphalo.v1.fabrication.yml` files
  
- Create a `buphalo.sh` script that uses the new template directory created above.
  - (see [README](../../README.md) for details
    - _N.B._ If you were using Bradfab's template directory, the `BRADFAB_FABRICATOR_TEMPLATE_ACTOR_DIRECTORY_PATH`
      probably ended in `Template/Actor/` (because Bradfab did not support Primary Actor Generation).
      Because Buphalo *does* support Primary Actor Generation, you should probably remove `Actor/` from this variable.
  - If you are using both Bradfab and Buphalo during a transition period:
    - Use the bradfab `1.0.0-beta9` release which has fixes to prevent it from reading Buphalo files.
    - Have your `buphalo.sh` script target a different directory than bradfab does and then merge the two directories
      with something like `cp -R`.
    
## Crap, something isn't working
If you find that the automatic upgrade script isn't sufficient and you need to keep old bradfab files around, please
let us know.
In the interim, you can delete any `.buphalo.v1.fabrication.yml` files that aren't working for you and stick with your
old bradfab files until you can get everything working in Buphalo.
(As above, you will need to upgrade bradfab to `1.0.0-beta9`.)
