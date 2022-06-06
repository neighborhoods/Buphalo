<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest;

use Neighborhoods\BuphaloTest\NonPrimaryActorUseStatement\SubClass;
use Neighborhoods\BuphaloTest\SomeOther\Actor;

class NonPrimaryActorUseStatement
{
    use Neighborhoods\BuphaloTest\SomeDifferentActor\AwareTrait;
}
