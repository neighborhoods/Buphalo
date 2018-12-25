<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template;

use Rhift\Bradfab\AnnotationProcessor\RepositoryInterface;
use Rhift\Bradfab\SupportingActor;
use Rhift\Bradfab\AnnotationProcessor;

class AnnotationTokenizer implements AnnotationTokenizerInterface
{
    use SupportingActor\Template\AwareTrait;
    use AnnotationProcessor\Repository\AwareTrait;
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
                '/(?<=\/\*\*)(\s+@rhift-bradfab:annotation-processor)(.*)([\s\S]*?)(?=\*\/)/',
                $templateContents,
                $annotations
            );
            $tokenizedContents = $templateContents;
            if ($numberOfAnnotations > 0) {
                foreach ($annotations[1] as $index => $tag) {
                    if (trim($tag) === '@rhift-bradfab:annotation-processor') {
                        $supportingActor = $this->getSupportingActorTemplate()->getFabricationFileSupportingActor();
                        $repository = $this->getAnnotationProcessorRepository();
                        $annotationProcessor = $repository->getByFQCN('\Rhift\Bradfab\AnnotationProcessor');
                        if ($supportingActor->hasAnnotationProcessorMap()) {
                            $annotationProcessors = $supportingActor->getAnnotationProcessorMap();
                            $annotationProcessorIndex = trim($annotations[2][$index]);
                            if (isset($annotationProcessors[$annotationProcessorIndex])) {
                                $annotationProcessor = $annotationProcessors[$annotationProcessorIndex];
                            }
                        }
                        $annotationProcessor->setAnnotationContents($annotations[3][$index]);
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
}
