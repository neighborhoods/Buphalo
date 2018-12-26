<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template;

use Rhift\Bradfab\AnnotationProcessor\BuilderInterface;
use Rhift\Bradfab\AnnotationProcessorInterface;
use Rhift\Bradfab\SupportingActor;
use Rhift\Bradfab\AnnotationProcessor;

class AnnotationTokenizer implements AnnotationTokenizerInterface
{
    use SupportingActor\Template\AwareTrait;
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
            $templateContents = $this->getSupportingActorTemplate()->getContents();
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

            $this->getSupportingActorTemplate()->updateContents($tokenizedContents);
            $this->tokenized_contents = $tokenizedContents;
        }

        return $this->tokenized_contents;
    }

    // @todo - try refactoring this as a builder alias.
    protected function getAnnotationProcessor(array $annotations, int $index): AnnotationProcessorInterface
    {
        $supportingActor = $this->getSupportingActorTemplate()->getFabricationFileSupportingActor();
        $annotationProcessor = null;
        if ($supportingActor->hasAnnotationProcessorMap()) {
            $annotationProcessors = $supportingActor->getAnnotationProcessorMap();
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
