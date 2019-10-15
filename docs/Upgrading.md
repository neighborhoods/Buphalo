# Upgrading from Bradfab

Buphalo is designed to be run in place of or in addition to Bradfab.
This should allow you to upgrade specific files as desired in case there's an issue during the RC process.

Steps to Upgrade

- Copy whatever directory you are using for Bradfab templates into a new directory for Buphalo
  - This might be `/vendor/neighborhoods/bradfab/src/Template/`.
    If so, and you decide to just use the `vendor/neighborhoods/buphalo/template-tree/` directory,
    we make no guarantees about things working the same.
    As such, we recommend maintaining your own template directory where it'll be easier to include your own templates
    as you find the need for them.
 
- Do a search/replace to change all occurences of `Bradfab` in your new template directory to `Buphalo`
  - This is especially important for the `Neighborhoods\Bradfab` namespaces that are used as placeholders
  
- Run `vendor/bin/upgrade.php <directory>`
  - Where `<directory>` is the top level directory of all of your current `.fabrication.yml` files.
    (probably `src`.)
  - This script will create new `.buphalo.v1.fabrication.yml` files
  
- Create a `buphalo.sh` script that uses the new template directory created above.
  - (see [README](../README.md) for details
