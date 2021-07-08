<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\Fully\QualifiedTrait;

class Handler implements HandlerInterface
{
    use \Neighborhoods\BuphaloTest\NonPrimaryActor\AwareTrait;
    use \Neighborhoods\BuphaloTest\Fully\QualifiedTrait\Map\Repository\AwareTrait;
}
