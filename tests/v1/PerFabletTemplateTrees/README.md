# Testing Per-Fablet Template Trees

This is to test per-Fablet template tree preferences.

## Test Cases:
Based on the fabrication file using the following definition
```yaml
preferredTemplateTrees:
  - secondary
```

|File                                 |In Primary|In Secondary|In Tertiary|Selected |
|-------------------------------------|----------|------------|-----------|---------|
|PrimaryActorName.php                 |Yes       |No          |No         |Primary  |
|PrimaryActorName.service.yml         |Yes       |Yes         |No         |Secondary|
|PrimaryActorNameInterface.php        |No        |Yes         |Yes        |Secondary|
|PrimaryActorName/Factory.php         |No        |No          |Yes        |Tertiary |
|PrimaryActorName/FactoryInterface.php|Yes       |No          |Yes        |Primary  |
