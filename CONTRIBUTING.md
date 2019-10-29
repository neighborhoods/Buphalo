# Contributing to Buphalo

## Setting Up Git When Developing Buphalo As A Composer Dependency
From your product root, and with Buphalo installed as a composer dependency
```bash
cd vendor/neighborhoods/buphalo && rm -rf .git && git clone git@github.com:neighborhoods/Buphalo.git && cp -R Buphalo/.git . && rm -rf Buphalo/ && cd ../../../
```
