# Bradfab

## Example Fabrication Files
* A Fabrication File builds a [`Fablet`](#fablets) for any arbitrary `<Object>`.
* The [`Fablet`](#fablets) `<Object>` is identified by the Fabrication File name and the location in the directory structure.
* In the below exmaples one [`Fablet`](#fablets) `<Object>` is `Toe` and another [`Fablet`](#fablets) `<Object>` is `Toes\Nail`.
* A [`Fablet`](#fablets) `<Object>` can be any PHP object.
```yml
# src/V2/Toe.fabricate.yml
fabricate:
  AwareTrait: true
  Factory: true
  FactoryInterface: true
  Factory\AwareTrait: true
  Builder: true
  BuilderInterface: true
  Builder\AwareTrait: true
  Builder\Factory: true
  Builder\FactoryInterface: true
  Builder\Factory\AwareTrait: true
  Repository: true
  RepositoryInterface: true
  Repository\AwareTrait: true
  Map: true
  MapInterface: true
  Map\AwareTrait: true
  Map\Factory: true
  Map\FactoryInterface: true
  Map\Factory\AwareTrait: true
```
```yml
# src/V2/Toe/Nail.fabricate.yml
fabricate:
  AwareTrait: true
  Factory: true
  FactoryInterface: true
  Factory\AwareTrait: true
  Builder: true
  BuilderInterface: true
  Builder\AwareTrait: true
  Builder\Factory: true
  Builder\FactoryInterface: true
  Builder\Factory\AwareTrait: true
```

## Turning Off Fabrication Of A Supporting Actor For An `<Object>`
* Remove the Supporting Actor entry from the Fabrication File.
* Comment the Supporting Actor entry from the Fabrication File.
* Set the value of the Supporting Actor in the Fabricatio File to `false`.

## Adding A New Template
* Add the appropriate PHP and DI service definition YAML files in the position that you want them under `src/Template/Actor`.

## Updating A Template
* Update the PHP and/or DI service definition YAML files under `src/Template/Actor`.

## `Fablet`s
* A Fablet is the collection of Supporting Actors that are built from the Fabrication File.
