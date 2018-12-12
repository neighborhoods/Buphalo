<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile;

use Rhift\BradFab\FabricationFileInterface;

interface RepositoryInterface
{
    public function add(AskInterface $ask): RepositoryInterface;

    public function exists(AskInterface $ask): bool;

    public function get(AskInterface $ask): FabricationFileInterface;

    public function replace(AskInterface $ask): RepositoryInterface;

    public function remove(AskInterface $ask): RepositoryInterface;

    public function startTransaction(): RepositoryInterface;

    public function commit(): RepositoryInterface;

    public function rollback(): RepositoryInterface;
}
