<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace\Map;

use InvalidArgumentException;
use LogicException;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace\MapInterface;
use Neighborhoods\Buphalo\V1;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use V1\Actor\Template\Tokenizer\Rule\StrReplace\Builder\Factory\AwareTrait;
    use V1\Actor\Template\Tokenizer\Rule\Map\Builder\Factory\AwareTrait;
    use V1\Actor\Template\Tokenizer\Rule\Context\AwareTrait;

    protected $Instructions;

    public function build(): MapInterface
    {
        $map = $this->getV1ActorTemplateTokenizerRuleStrReplaceMapFactory()->create();
        foreach ($this->getInstructions() as $instruction) {
            $ruleBuilder = $this->getV1ActorTemplateTokenizerRuleStrReplaceBuilderFactory()->create();
            $ruleBuilder->setRuleDefinition($instruction);
            $ruleBuilder->setV1ActorTemplateTokenizerRuleContext($this->getV1ActorTemplateTokenizerRuleContext());
            $map->append($ruleBuilder->build());
        }

        return $map;
    }

    protected function getInstructions(): array
    {
        if ($this->Instructions === null) {
            throw new LogicException('Builder instructions has not been set.');
        }

        return $this->Instructions;
    }

    public function addInstruction(array $instruction): BuilderInterface
    {
        if (count($instruction) !== 2) {
            throw new InvalidArgumentException('Instruction does not have exactly two fields.');
        }
        if (!array_key_exists(StrReplace\BuilderInterface::DEFINITION_KEY_SEARCH, $instruction)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Instruction does not contain a "%s" field.',
                    StrReplace\BuilderInterface::DEFINITION_KEY_SEARCH
                )
            );
        }
        if (!array_key_exists(StrReplace\BuilderInterface::DEFINITION_KEY_REPLACE, $instruction)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Instruction does not contain a "%s" field.',
                    StrReplace\BuilderInterface::DEFINITION_KEY_REPLACE
                )
            );
        }

        $this->Instructions[] = $instruction;

        return $this;
    }
}
