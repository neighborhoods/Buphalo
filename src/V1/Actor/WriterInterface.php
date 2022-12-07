<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor;

use Neighborhoods\Buphalo\V1\Actor\Template\CompilerInterface;

interface WriterInterface
{
    public const SOURCE_OVERRIDE_BEHAVIOR_SKIP = 'skip';
    public const SOURCE_OVERRIDE_BEHAVIOR_WRITE = 'write';
    public const SOURCE_OVERRIDE_BEHAVIOR_THROW = 'throw';

    public const SOURCE_OVERRIDE_BEHAVIOR_DEFAULT = self::SOURCE_OVERRIDE_BEHAVIOR_SKIP;

    public function setActorTemplateCompiler(CompilerInterface $Compiler);

    public function write(): WriterInterface;
}
