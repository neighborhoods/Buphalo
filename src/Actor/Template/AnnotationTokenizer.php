<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template;

use Neighborhoods\Bradfab\Actor;
use Neighborhoods\Bradfab\AnnotationProcessor;
use Neighborhoods\Bradfab\AnnotationProcessor\BuilderInterface;
use Neighborhoods\Bradfab\AnnotationProcessorInterface;

class AnnotationTokenizer implements AnnotationTokenizerInterface
{
    use Actor\Template\AwareTrait;
    use AnnotationProcessor\Builder\Factory\AwareTrait;
    protected $tokenized_contents;

    public function tokenize(): AnnotationTokenizerInterface
    {
        $this->getTokenizedContents();

        return $this;
    }

    public function getTokenizedContents(): string
    {
        if ($this->tokenized_contents === null) {
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
            $this->tokenized_contents = $tokenizedContents;
        }

        return $this->tokenized_contents;
    }

    // @Please refactor this as a named builder.
    protected function getAnnotationProcessor(array $annotations, int $index): AnnotationProcessorInterface
    {
        $targetActor = $this->getActorTemplate()->getFabricationFileActor();
        $annotationProcessor = null;
        if ($targetActor->hasAnnotationProcessorMap()) {
            $annotationProcessors = $targetActor->getAnnotationProcessorMap();
            $annotationProcessorIndex = trim($annotations[2][$index]);
            if (isset($annotationProcessors[$annotationProcessorIndex])) {
                $annotationProcessor = $annotationProcessors[$annotationProcessorIndex];
            }
        }
        if ($annotationProcessor === null) {
            $annotationProcessorBuilder = $this->getAnnotationProcessorBuilderFactory()->create();
            $annotationProcessorDefinition = [BuilderInterface::PROCESSOR_FQCN => AnnotationProcessor::class];
            $annotationProcessor = $annotationProcessorBuilder->setRecord($annotationProcessorDefinition)->build();
        }
        $annotationProcessor->getAnnotationProcessorContext()->setAnnotationContents($annotations[3][$index]);

        return $annotationProcessor;
    }
}
