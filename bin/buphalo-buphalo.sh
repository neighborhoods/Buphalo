#!/usr/bin/env bash
# Bash instructions to Buphalo Buphalo.

cd "$(dirname "$0")" || exit
cd ..
if [ -f bin/buphalo.phar ]; then
  BUPHALO_ENTRY_POINT=bin/buphalo.phar
else
  BUPHALO_ENTRY_POINT=bin/buphalo
fi
Neighborhoods_Buphalo_TargetApplication_BuilderInterface__SourceDirectoryPath=$PWD/src \
Neighborhoods_Buphalo_TargetApplication_BuilderInterface__FabricationDirectoryPath=$PWD/fab \
Neighborhoods_Buphalo_TargetApplication_BuilderInterface__NamespacePrefix=Neighborhoods\\Buphalo\\ \
Neighborhoods_Buphalo_TemplateTree_Map_Builder_FactoryInterface__TemplateTreeDirectoryPaths=$PWD/template-tree,$PWD/template-tree1 \
php $BUPHALO_ENTRY_POINT
