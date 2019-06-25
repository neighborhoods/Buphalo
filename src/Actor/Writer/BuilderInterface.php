<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Writer;

use Neighborhoods\Bradfab\Actor\WriterInterface;

interface BuilderInterface
{
    public function build(): WriterInterface;
}
