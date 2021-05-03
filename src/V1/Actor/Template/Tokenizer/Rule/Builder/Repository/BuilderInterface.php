<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Repository;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\RepositoryInterface;

interface BuilderInterface
{
    public const OPTION_BUILDER_FACTORY_SERVICE = 'builder.factory.service';

    public function build(): RepositoryInterface;
}
