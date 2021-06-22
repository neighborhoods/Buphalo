<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor;

use LogicException;
use Neighborhoods\Buphalo\V2\FabricationFile;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection PHPStorm doesn't detect Trait override */
class Context implements ContextInterface
{
    use FabricationFile\AwareTrait {
        getFabricationFile as public;
    }

    protected $static_context_record;
    protected $annotation_contents;

    public function getStaticContextRecord(): array
    {
        if ($this->static_context_record === null) {
            throw new LogicException('Context static_context_record has not been set.');
        }

        return $this->static_context_record;
    }

    public function hasStaticContextRecord(): bool
    {
        return ($this->static_context_record !== null);
    }

    public function setStaticContextRecord(array $static_context_record): ContextInterface
    {
        if ($this->static_context_record !== null) {
            throw new LogicException('Context static_context_record is already set.');
        }

        $this->static_context_record = $static_context_record;

        return $this;
    }

    public function getReplacement(): string
    {
        return rtrim($this->getAnnotationContents());
    }

    public function getAnnotationContents(): string
    {
        if ($this->annotation_contents === null) {
            throw new LogicException('Context annotation_contents has not been set.');
        }

        return $this->annotation_contents;
    }

    public function setAnnotationContents(string $annotation_contents): ContextInterface
    {
        if ($this->annotation_contents !== null) {
            throw new LogicException('Context annotation_contents is already set.');
        }

        $this->annotation_contents = $annotation_contents;

        return $this;
    }
}
