<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template;

use Neighborhoods\Buphalo\Actor\TemplateInterface;
use Neighborhoods\Buphalo\FabricationFileInterface;

interface AnnotationTokenizerInterface
{
    public const ANNOTATION_TAG = '@neighborhoods-buphalo:annotation-processor';
    public const ANNOTATION_REGEX = '/(?<=\/\*\*)(\s+' . self::ANNOTATION_TAG . ')(.*)([\s\S]*?)(?=\*\/)/';

    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function setActorTemplate(TemplateInterface $Template);

    public function tokenize(): AnnotationTokenizerInterface;

    public function getTokenizedContents(): string;
}
