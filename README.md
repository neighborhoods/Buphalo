# Bradfab

## Exmaple Fabrication File
```yml
# src/V2/Toes.fabricate.yml
build:
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

## Turning Off Fabrication Of A Supporting Actor For An `<Object>`
* Remove the entry from teh Fabrication File.
* Set the value of the Supporting Actor in the Fabricatio File to `false`.

## Adding A New Template
* Add the appropriate PHP and DI service definition YAML files in the position that you want them under `src/Template/Actor`.

## Updating A Template
* Update the PHP and/or DI service definition YAML files under `src/Template/Actor`.
