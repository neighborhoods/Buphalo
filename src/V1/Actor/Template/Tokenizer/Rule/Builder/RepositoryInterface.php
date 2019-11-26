<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map\FactoryInterface;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\BuilderInterface;

interface RepositoryInterface
{
    public const FILE_TYPE_ALL = '*';

    public function add(string $FileExtension, BuilderInterface $Builder): RepositoryInterface;

    public function getByFileExtension(string $FileExtension): MapInterface;

    public function setV1ActorTemplateTokenizerRuleBuilderMapFactory(
        FactoryInterface $v1ActorTemplateTokenizerRuleBuilderMapFactory
    );

    public function setV1ActorTemplateTokenizerRuleBuilderMapMap(
        Map\MapInterface $v1ActorTemplateTokenizerRuleBuilderMapMap
    );
}
