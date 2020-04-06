# Testing Global Template Trees

This is to test Multiple Template Trees specified at the Global (Environment) Level

## Test Cases:

|File                         |In Primary|In Secondary|Selected |
|-----------------------------|----------|------------|---------|
|PrimaryActorName.php         |Yes       |No          |Primary  |
|PrimaryActorNameInterface.php|No        |Yes         |Secondary|
|PrimaryActorName.service.yml |Yes       |Yes         |Primary  |
