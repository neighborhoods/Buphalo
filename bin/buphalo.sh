#!/usr/bin/env bash
# Bash instructions to Buphalo Buphalo.

cd "$(dirname "$0")" || exit
cd ..
Neighborhoods_Buphalo_TargetApplication_BuilderInterface__SourceDirectoryPath=$PWD/src \
Neighborhoods_Buphalo_TargetApplication_BuilderInterface__FabricationPath=$PWD/fab \
Neighborhoods_Buphalo_TargetApplication_BuilderInterface__Namespace=Neighborhoods\\Buphalo\\ \
Neighborhoods_Buphalo_TemplateTree_Map_Builder_FactoryInterface__TemplateTreeDirectoryPaths=$PWD/template-tree,$PWD/template-tree1 \
bin/buphalo
