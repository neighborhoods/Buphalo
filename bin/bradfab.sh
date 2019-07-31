#!/usr/bin/env bash
# Bash instructions to Bradfab Bradfab.

cd "$(dirname "$0")"
cd ..
Neighborhoods_Bradfab_TargetApplication_BuilderInterface__SourceDirectoryPath=$PWD/src \
Neighborhoods_Bradfab_TargetApplication_BuilderInterface__FabricationPath=$PWD/fab \
Neighborhoods_Bradfab_TargetApplication_BuilderInterface__Namespace=Neighborhoods\\Bradfab\\ \
Neighborhoods_Bradfab_TemplateTree_Map_Builder_FactoryInterface__TemplateTreeDirectoryPaths=$PWD/template-tree,$PWD/template-tree1 \
bin/bradfab
