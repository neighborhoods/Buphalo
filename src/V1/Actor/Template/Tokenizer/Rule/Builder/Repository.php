<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\BuilderInterface;
use Neighborhoods\Buphalo\V1;

class Repository implements RepositoryInterface
{
    use V1\Actor\Template\Tokenizer\Rule\Builder\Map\Factory\AwareTrait;
    use V1\Actor\Template\Tokenizer\Rule\Builder\Map\Map\AwareTrait;

    private $FileTypeIndex;

    public function add(string $FileExtension, BuilderInterface $Builder): RepositoryInterface
    {
        if (!isset($this->getV1ActorTemplateTokenizerRuleBuilderMapMap()[$FileExtension])) {
            $builderMap = $this->getV1ActorTemplateTokenizerRuleBuilderMapFactory()->create();
            $this->getV1ActorTemplateTokenizerRuleBuilderMapMap()[$FileExtension] = $builderMap;
        }
        $this->getV1ActorTemplateTokenizerRuleBuilderMapMap()[$FileExtension]->append($Builder);

        return $this;
    }

    public function getByFileExtension(string $FileExtension): MapInterface
    {
        return $this->getV1ActorTemplateTokenizerRuleBuilderMapMap()[$FileExtension];
    }
}
