<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

use Rhift\Bradfab\Template\ActorInterface;

class Repository implements RepositoryInterface
{
    public function add(ActorInterface $Actor): RepositoryInterface
    {
        // TODO: Implement add() method.
        throw new \LogicException('Unimplemented add method.');

        return $this;
    }

    public function getByIdentity(string $identity): ActorInterface
    {
        // TODO: Implement getByIdentity() method.
        throw new \LogicException('Unimplemented get method.');

        return $Actor;
    }
}
