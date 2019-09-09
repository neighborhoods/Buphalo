<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\Actor;

use Neighborhoods\BuphaloTemplateTree\Actor;
use Neighborhoods\BuphaloTemplateTree\ActorInterface;

class Repository implements RepositoryInterface
{
    use Actor\Builder\Factory\AwareTrait;

    public function add(ActorInterface $Actor): RepositoryInterface
    {
        /** @neighborhoods-buphalo:annotation-processor \Neighborhoods\BuphaloTemplateTree\Actor\Repository.add1
        // TODO: Implement add() method.
        throw new \LogicException('Unimplemented add method.');
        */

        return $this;
    }

    public function getByIdentity(string $identity): ActorInterface
    {
        $Actor = $this->getActorBuilderFactory()->create()->build();
        /** @neighborhoods-buphalo:annotation-processor \Neighborhoods\BuphaloTemplateTree\Actor\Repository.getByIdentity2
        // TODO: Implement getByIdentity() method.
        throw new \LogicException('Unimplemented get method.');
        */

        return $Actor;
    }
}
