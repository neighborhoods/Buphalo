#!/usr/bin/env bash
# Bash instructions to Buphalo Buphalo from a generated PHP Archive using makephar.php.

cd "$(dirname "$0")" || exit
cd ../..
Neighborhoods_Buphalo_V2_TargetApplication_BuilderInterface__SourceDirectoryPath=$PWD/src \
Neighborhoods_Buphalo_V2_TargetApplication_BuilderInterface__FabricationDirectoryPath=$PWD/fab \
Neighborhoods_Buphalo_V2_TargetApplication_BuilderInterface__NamespacePrefix=Neighborhoods\\Buphalo\\ \
Neighborhoods_Buphalo_V2_TemplateTree_Map_Builder_FactoryInterface__TemplateTreeDirectoryPaths=$PWD/template-tree/V2,$PWD/template-tree1 \
php bin/v2/buphalo.phar
