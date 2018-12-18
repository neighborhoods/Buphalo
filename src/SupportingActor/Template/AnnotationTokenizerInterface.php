<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template;

use Rhift\Bradfab\SupportingActor\TemplateInterface;

interface AnnotationTokenizerInterface
{
    public const ANNOTATION_TOKEN = '/**ANNOTATION_TOKEN**/';

    public function setSupportingActorTemplate(TemplateInterface $Template);

    public function tokenize(): AnnotationTokenizerInterface;

    public function getTokenizedContents(): string;
}
