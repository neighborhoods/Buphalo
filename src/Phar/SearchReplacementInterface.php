<?php

namespace Neighborhoods\Buphalo\Phar;

interface SearchReplacementInterface
{
    public function getSearch(): string;

    public function setSearch(string $pattern): SearchReplacementInterface;

    public function getReplacement(): string;

    public function setReplacement(string $replacement): SearchReplacementInterface;
}
