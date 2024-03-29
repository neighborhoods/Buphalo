<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName;
use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorNameInterface;

class Repository implements RepositoryInterface
{
    use PrimaryActorName\Builder\Factory\AwareTrait;

    public function add(PrimaryActorNameInterface $PrimaryActorName): RepositoryInterface
    {
        /** @neighborhoods-buphalo:annotation-processor \Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Repository.add1
        // TODO: Implement add() method.
        throw new \LogicException('Unimplemented add method.');
        */

        return $this;
    }

    public function getByIdentity(string $identity): PrimaryActorNameInterface
    {
        $PrimaryActorName = $this->getNamespacedPrimaryActorNameBuilderFactory()->create()->build();
        /** @neighborhoods-buphalo:annotation-processor \Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Repository.getByIdentity2
        // TODO: Implement getByIdentity() method.
        throw new \LogicException('Unimplemented get method.');
        */

        return $PrimaryActorName;
    }
}
