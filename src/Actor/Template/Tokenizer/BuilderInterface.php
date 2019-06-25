<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Tokenizer;

use Neighborhoods\Bradfab\Actor\Template\TokenizerInterface;
use Neighborhoods\Bradfab\ActorInterface;

interface BuilderInterface
{
    public function setActor(ActorInterface $Actor);

    public function build(): TokenizerInterface;
}
