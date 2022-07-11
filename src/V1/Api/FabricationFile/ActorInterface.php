<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Api\FabricationFile;

use Neighborhoods\Buphalo\V1\StringMapInterface;
use Neighborhoods\Buphalo\V1\Api\FabricationFile\Actor\AnnotationProcessor;

interface ActorInterface extends \JsonSerializable
{
    public const PROP_TEMPLATE = 'template';
    public const PROP_PREFERRED_TEMPLATE_TREES = 'preferred_template_trees';
    public const PROP_ANNOTATION_PROCESSORS = 'annotation_processors';

    public function getTemplate(): string;
    public function setTemplate(string $template): ActorInterface;

    public function getPreferredTemplateTrees(): StringMapInterface;
    public function setPreferredTemplateTrees(StringMapInterface $preferred_template_trees): ActorInterface;
    public function hasPreferredTemplateTrees(): bool;

    public function getAnnotationProcessors(): AnnotationProcessor\MapInterface;
    public function setAnnotationProcessors(AnnotationProcessor\MapInterface $annotation_processors): ActorInterface;
    public function hasAnnotationProcessors(): bool;
}
