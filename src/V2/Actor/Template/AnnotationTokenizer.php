<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template;

use Neighborhoods\Buphalo\V2\Actor;
use Neighborhoods\Buphalo\V2\AnnotationProcessor;
use Neighborhoods\Buphalo\V2\AnnotationProcessor\BuilderInterface;
use Neighborhoods\Buphalo\V2\AnnotationProcessorInterface;
use Neighborhoods\Buphalo\V2\FabricationFile;

class AnnotationTokenizer implements AnnotationTokenizerInterface
{
    use Actor\Template\AwareTrait;
    use AnnotationProcessor\Builder\Factory\AwareTrait;
    use FabricationFile\AwareTrait;

    protected $TokenizedContents;

    private $memoizedAnnotationProcessors = [];

    public function tokenize(): AnnotationTokenizerInterface
    {
        $this->getTokenizedContents();

        return $this;
    }

    public function getTokenizedContents(): string
    {
        if ($this->TokenizedContents === null) {
            $templateContents = $this->getActorTemplate()->getContents();
            $numberOfAnnotations = preg_match_all(
                self::ANNOTATION_REGEX,
                $templateContents,
                $annotations
            );
            $tokenizedContents = $templateContents;
            if ($numberOfAnnotations > 0) {
                foreach ($annotations[1] as $index => $tag) {
                    if (trim($tag) === self::ANNOTATION_TAG) {
                        $annotationProcessor = $this->getAnnotationProcessor($annotations, $index);
                        $tokenizedContents = str_replace(
                            sprintf('/**%s*/', $annotations[0][$index]),
                            $annotationProcessor->getReplacement(),
                            $tokenizedContents
                        );
                    }
                }
            }

            $this->getActorTemplate()->applyTokenizedContents($tokenizedContents);
            $this->TokenizedContents = $tokenizedContents;
        }

        return $this->TokenizedContents;
    }

    // @Please refactor this as a named builder.
    protected function getAnnotationProcessor(array $annotations, int $index): AnnotationProcessorInterface
    {
        $targetActor = $this->getActorTemplate()->getFabricationFileActor();
        $annotationProcessor = null;
        if ($targetActor->hasAnnotationProcessorMap()) {
            $annotationProcessorIndex = trim($annotations[2][$index]);
            if (isset($this->memoizedAnnotationProcessors[$annotationProcessorIndex])) {
                return $this->memoizedAnnotationProcessors[$annotationProcessorIndex];
            }

            $annotationProcessors = $targetActor->getAnnotationProcessorMap();
            if (isset($annotationProcessors[$annotationProcessorIndex])) {
                $annotationProcessor = $annotationProcessors[$annotationProcessorIndex];
                $this->memoizedAnnotationProcessors[$annotationProcessorIndex] = $annotationProcessor;
            }
        }
        // "default" processor - trim out the annotation.
        if ($annotationProcessor === null) {
            $annotationProcessorBuilder = $this->getAnnotationProcessorBuilderFactory()->create();
            $annotationProcessorBuilder->setFabricationFile($this->getFabricationFile());
            $annotationProcessorDefinition = [BuilderInterface::PROCESSOR_FQCN => AnnotationProcessor::class];
            $annotationProcessor = $annotationProcessorBuilder->setRecord($annotationProcessorDefinition)->build();
        }
        $annotationProcessor->getAnnotationProcessorContext()->setAnnotationContents($annotations[3][$index]);

        return $annotationProcessor;
    }
}
