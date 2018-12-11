# Bradfab
Fabricates patterns.

Anything good I stole from someone else. Anything bad is mine.

## Problem
Implementing well designed patterns can become tedious and laborious.

## Proposed Solution
Use an easy to change code generation tool to generate well designed patterns for you.

## Fabrication Files
* A `Fabrication File` contains the instructions for fabricating a [`Fablet`](#fablet) for any arbitrary `<Object>`.
* The [`Fablet`](#fablet) `<Object>` is identified by the `Fabrication File` file name, and the location of the `Fabrication File` within the directory structure that it resides.
* In the below examples one [`Fablet`](#fablet) `<Object>` is `Toe` and another [`Fablet`](#fablet) `<Object>` is `Toe\Nail`.
* A [`Fablet`](#fablet) `<Object>` can be any PHP object.

## Example Fabrication Files
* Relative to the root of your software product.
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
  Map\Builder: true
  Map\BuilderInterface: true
  Map\Builder\AwareTrait: true
  Map\Builder\Factory: true
  Map\Builder\FactoryInterface: true
  Map\Builder\Factory\AwareTrait: true
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
* Remove the Supporting Actor entry from the `Fabrication File`.
* Comment the Supporting Actor entry from the `Fabrication File`.
* Set the value of the Supporting Actor in the `Fabricatio File` to `false`.

## Adding A New Template
* Add the appropriate PHP and DI service definition YAML files in the position that you want them under `src/Template/Actor`.

## Updating An Existing Template
* Update the PHP and/or DI service definition YAML files under `src/Template/Actor`.

## `Fablet`
(credit [Mucha](https://github.com/pmucha-55places))
* A `Fablet` is the collection of Supporting Actors that are built from the Fabrication File for an `<Object>`.
