<?php
declare(strict_types=1);

namespace Neighborhoods\BradfabTemplateTree\Actor;

use Neighborhoods\BradfabTemplateTree\Actor;
use Neighborhoods\BradfabTemplateTree\ActorInterface;

class Repository implements RepositoryInterface
{
    use Actor\Builder\Factory\AwareTrait;

    public function add(ActorInterface $Actor): RepositoryInterface
    {
        /** @neighborhoods-bradfab:annotation-processor \Neighborhoods\BradfabTemplateTree\Actor\Repository.add1
        // TODO: Implement add() method.
        throw new \LogicException('Unimplemented add method.');
        */

        return $this;
    }

    public function getByIdentity(string $identity): ActorInterface
    {
        $Actor = $this->getActorBuilderFactory()->create()->build();
        /** @neighborhoods-bradfab:annotation-processor \Neighborhoods\BradfabTemplateTree\Actor\Repository.getByIdentity2
        // TODO: Implement getByIdentity() method.
        throw new \LogicException('Unimplemented get method.');
        */

        return $Actor;
    }
}
