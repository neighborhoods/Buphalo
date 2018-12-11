<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

use Doctrine;
use Rhift\Bradfab\Template\Actor;

class Repository implements RepositoryInterface
{
    use Actor\Builder\Factory\AwareTrait;

    public function get(AskInterface $ask): MapInterface
    {
        return $actor = $this->getActorBuilderFactory()->create()->setRecord($records)->build();
    }
}
