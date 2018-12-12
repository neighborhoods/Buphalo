<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile;

use Rhift\Bradfab\FabricationFile;
use Rhift\Bradfab\FabricationFileInterface;

class Repository implements RepositoryInterface
{
    use FabricationFile\Builder\Factory\AwareTrait;

    public function get(AskInterface $ask): FabricationFileInterface
    {
        // TODO: Implement get() method.
        throw new \LogicException('Unimplemented get method.');

        return $this;
    }

    public function add(AskInterface $ask): RepositoryInterface
    {
        // TODO: Implement add() method.
        throw new \LogicException('Unimplemented add method.');

        return $this;
    }

    public function exists(AskInterface $ask): bool
    {
        // TODO: Implement exists() method.
        throw new \LogicException('Unimplemented exists method.');

        return $this;
    }

    public function replace(AskInterface $ask): RepositoryInterface
    {
        // TODO: Implement replace() method.
        throw new \LogicException('Unimplemented replace method.');

        return $this;
    }

    public function remove(AskInterface $ask): RepositoryInterface
    {
        // TODO: Implement remove() method.
        throw new \LogicException('Unimplemented remove method.');

        return $this;
    }

    public function startTransaction(): RepositoryInterface
    {
        // TODO: Implement startTransaction() method.
        throw new \LogicException('Unimplemented start transaction method.');

        return $this;
    }

    public function commit(): RepositoryInterface
    {
        // TODO: Implement commit() method.
        throw new \LogicException('Unimplemented commit method.');

        return $this;
    }

    public function rollback(): RepositoryInterface
    {
        // TODO: Implement rollback() method.
        throw new \LogicException('Unimplemented rollback method.');

        return $this;
    }
}
