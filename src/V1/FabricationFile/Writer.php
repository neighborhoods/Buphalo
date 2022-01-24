<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile;

use Neighborhoods\Buphalo\V1\FabricationFileInterface;
use Neighborhoods\Buphalo\V1\AnnotationProcessor;
use Neighborhoods\Buphalo\V1\AnnotationProcessorInterface;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Filesystem\Filesystem;

class Writer implements WriterInterface
{
    public function write(
        FabricationFileInterface $fabricationFile,
        int $indentSize = self::DEFAULT_INDENT_SIZE
    ): WriterInterface {
        $data = $this->buildData($fabricationFile);
        $outputYaml = Yaml::dump($data, PHP_INT_MAX, $indentSize);
        $this->putFile($fabricationFile, $outputYaml);

        return $this;
    }

    private function buildData(FabricationFileInterface $fabricationFile): array
    {
        $actors = $this->buildActors($fabricationFile->getActors());

        $data = [
            FabricationFileInterface::KEY_PREFERRED_TEMPLATE_TREES => $fabricationFile->getPreferredTemplateTrees(),
            Actor\Map\BuilderInterface::ACTORS => $actors,
        ];

        return $data;
    }

    private function buildActors(Actor\MapInterface $actors): array
    {
        $actorData = [];
        foreach ($actors as $actorName => $actor) {
            $actorDatum = $this->buildActor($actor);

            /** @noinspection OffsetOperationsInspection */ // PHPStorm thinks this could be bool or float?
            $actorData[$actorName] = $actorDatum;
        }

        return $actorData;
    }

    private function buildActor(ActorInterface $actor): array
    {
        $actorDatum = [
            Actor\BuilderInterface::TEMPLATE => $actor->getTemplateRelativeFilePath(),
        ];

        if ($actor->hasPreferredTemplateTrees()) {
            $actorDatum[Actor\BuilderInterface::PREFERRED_TEMPLATE_TREES] = $actor->getPreferredTemplateTrees();
        }

        if ($actor->hasAnnotationProcessorMap()) {
            $annotationProcessorData = $this->buildAnnotationProcessors($actor->getAnnotationProcessorMap());
            $actorDatum[Actor\BuilderInterface::ANNOTATION_PROCESSORS] = $annotationProcessorData;
        }

        if ($actor->hasPreferredTemplateTrees()) {
            $actorDatum[Actor\BuilderInterface::PREFERRED_TEMPLATE_TREES] = $actor->getPreferredTemplateTrees();
        }

        return $actorDatum;
    }

    private function buildAnnotationProcessors(AnnotationProcessor\MapInterface $annotationProcessors): array
    {
        $annotationProcessorData = [];

        foreach ($annotationProcessors as $annotationKey => $annotationProcessor) {
            $annotationProcessorDatum = $this->buildAnnotationProcessor($annotationProcessor);

            /** @noinspection OffsetOperationsInspection */ // PHPStorm thinks this could be bool or float?
            $annotationProcessorData[$annotationKey] = $annotationProcessorDatum;
        }

        return $annotationProcessorData;
    }

    private function buildAnnotationProcessor(AnnotationProcessorInterface $annotationProcessor): array
    {
        $annotationProcessorDatum = [
            AnnotationProcessor\BuilderInterface::PROCESSOR_FQCN => '\\' . \get_class($annotationProcessor),
        ];

        if ($annotationProcessor->getAnnotationProcessorContext()->hasStaticContextRecord()) {
            $annotationProcessorDatum[AnnotationProcessor\Context\BuilderInterface::STATIC_CONTEXT_RECORD] =
                $annotationProcessor->getAnnotationProcessorContext()->getStaticContextRecord();
        }

        return $annotationProcessorDatum;
    }

    private function putFile(FabricationFileInterface $fabricationFile, string $outputYaml): void
    {
        $filesystem = new Filesystem();
        $filesystem->dumpFile($fabricationFile->getFilePath(), $outputYaml);
    }
}
