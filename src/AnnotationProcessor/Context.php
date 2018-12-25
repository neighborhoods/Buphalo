<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor;

use Rhift\Bradfab\FabricationFile;

class Context implements ContextInterface
{
    use FabricationFile\AwareTrait {
        getFabricationFile as public;
    }
    protected $static_context_record;

    public function getStaticContextRecord(): array
    {
        if ($this->static_context_record === null) {
            throw new \LogicException('Context static_context_record has not been set.');
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
            throw new \LogicException('Context static_context_record is already set.');
        }

        $this->static_context_record = $static_context_record;

        return $this;
    }
}
