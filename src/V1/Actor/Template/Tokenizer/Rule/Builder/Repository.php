<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\BuilderInterface;
use Neighborhoods\Buphalo\V1;

class Repository implements RepositoryInterface
{
    use V1\Actor\Template\Tokenizer\Rule\Builder\Map\Factory\AwareTrait;
    use V1\Actor\Template\Tokenizer\Rule\Builder\Map\Map\AwareTrait;

    public function add(BuilderInterface $Builder): RepositoryInterface
    {
        $fileExtensionAffinity = $Builder->getOptions()[BuilderInterface::OPTION_FILE_EXTENSION_AFFINITY];
        if (!isset($this->getV1ActorTemplateTokenizerRuleBuilderMapMap()[$fileExtensionAffinity])) {
            $builderMap = $this->getV1ActorTemplateTokenizerRuleBuilderMapFactory()->create();
            $this->getV1ActorTemplateTokenizerRuleBuilderMapMap()[$fileExtensionAffinity] = $builderMap;
        }
        $this->getV1ActorTemplateTokenizerRuleBuilderMapMap()[$fileExtensionAffinity]->append($Builder);

        return $this;
    }

    public function getMapByFileExtension(string $FileExtension): MapInterface
    {
        $map = $this->getV1ActorTemplateTokenizerRuleBuilderMapFactory()->create();
        foreach ($this->getV1ActorTemplateTokenizerRuleBuilderMapMap()[$FileExtension] as $prototype) {
            $map[] = $this->copy($prototype);
        }

        return $map;
    }

    private function copy(BuilderInterface $prototype): BuilderInterface
    {
        /** @var BuilderInterface $builder */
        $builder = $prototype->getOptions()[Repository\BuilderInterface::OPTION_BUILDER_FACTORY_SERVICE]->create();
        $builder->setOptions($prototype->getOptions());

        return $builder;
    }
}
