<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Phar;

interface SearchReplacementInterface
{
    public function getSearch(): string;

    public function setSearch(string $pattern): SearchReplacementInterface;

    public function getReplacement(): string;

    public function setReplacement(string $replacement): SearchReplacementInterface;
}
