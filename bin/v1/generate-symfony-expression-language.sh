#!/usr/bin/env bash

cd "$(dirname "$0")" || exit
cd ../..
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__SourceDirectoryPath=$PWD/src \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__FabricationDirectoryPath=$PWD/fab \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__NamespacePrefix=Neighborhoods\\Buphalo\\ \
Neighborhoods_Buphalo_V1_TemplateTree_Map_Builder_FactoryInterface__TemplateTreeDirectoryPaths=$PWD/template-tree/V1 \
Neighborhoods_Buphalo_V1_FabricationFile_Map_BuilderInterface__FinderFileNames=\
ExpressionLanguageDecorator.buphalo.v1.fabrication.yml,\
ExpressionLanguage.buphalo.v1.fabrication.yml \
php bin/v1/buphalo