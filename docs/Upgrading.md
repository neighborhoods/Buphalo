# Upgrading from Bradfab

Buphalo is designed to be run in place of or in addition to Bradfab.
This should allow you to upgrade specific files as desired in case there's an issue during the RC process.

## Steps to Upgrade

- Copy whatever directory you are using for Bradfab templates into a new directory for Buphalo
  - This might be `/vendor/neighborhoods/bradfab/src/Template/`.
    If so, and you decide to just use the `vendor/neighborhoods/buphalo/template-tree/` directory,
    we make no guarantees about things working the same.
    As such, we recommend maintaining your own template directory where it'll be easier to include your own templates
    as you find the need for them.
 
- Do a search/replace to change all occurences of `Neighborhoods\Bradfab` in your new template directory to
  `Neighborhoods\BuphaloTemplateTree`
  
- Run `vendor/bin/upgrade.php bradfab <directory>`
  - Where `<directory>` is the top level directory of all of your current `.fabrication.yml` files.
    (probably `src`.)
  - This script will create new `.buphalo.v1.fabrication.yml` files
  
- Create a `buphalo.sh` script that uses the new template directory created above.
  - (see [README](../README.md) for details
  - If you are using both Bradfab and Buphalo, you will want to have this script target a different directory than
    bradfab and then merge the directory with `cp -R`
    
## Crap, something isn't working
If you find that the automatic upgrade script isn't sufficient and you need to keep old bradfab files around, you
can delete any `.buphalo.v1.fabrication.yml` files that aren't working for you and stick with your old bradfab files
until you can get everything working in Buphalo.
