#!/usr/bin/env bash
# Bash instructions to Bradfab Bradfab.

cd "$(dirname "$0")"
cd ..
BRADFAB_TARGET_APPLICATION_SOURCE_DIRECTORY_PATH=$PWD/src \
BRADFAB_TARGET_APPLICATION_FABRICATION_PATH=$PWD/fab \
BRADFAB_FABRICATOR_TEMPLATE_TREE_DIRECTORY_PATH=$PWD/src/Template \
BRADFAB_TARGET_APPLICATION_NAMESPACE=Neighborhoods\\Bradfab\\ \
bin/bradfab
