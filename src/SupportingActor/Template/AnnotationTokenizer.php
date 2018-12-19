<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template;

use Rhift\Bradfab\SupportingActor;

class AnnotationTokenizer implements AnnotationTokenizerInterface
{
    use SupportingActor\Template\AwareTrait;
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
                        $tokenizedContents = str_replace(
                            sprintf('/**%s*/', $annotations[0][$index]),
                            self::ANNOTATION_TOKEN,
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
