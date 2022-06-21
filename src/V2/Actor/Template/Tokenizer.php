<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template;

use Neighborhoods\Buphalo\V2\Actor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */ // PhpStorm doesn't recognize visibility override
class Tokenizer implements TokenizerInterface
{
    use Actor\Template\AwareTrait;
    use Actor\Template\AnnotationTokenizer\AwareTrait;
    use Actor\AwareTrait {
        getActor as public;
    }

    private const REPLACEMENTS = [
        'Neighborhoods\\BuphaloTemplateTree' => self::TOKEN_NAMESPACE_PREFIX,
        '\RelativeNamespace' => self::TOKEN_NAMESPACE_RELATIVE,
        'NamespacedPrimaryActorName' => self::TOKEN_PRIMARY_ACTOR_NAME_FULL_PASCAL,
        'PrimaryActorName' => self::TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL,
        'NamespacedParentActorName' => self::TOKEN_PARENT_ACTOR_NAME_FULL_PASCAL,
        'RelativeParentActorName' => self::TOKEN_PARENT_ACTOR_NAME_RELATIVE_PASCAL,
        'ParentActorName' => self::TOKEN_PARENT_ACTOR_NAME_SHORT_PASCAL,
        'RelativeParentActorClassPath' => self::TOKEN_PARENT_ACTOR_CLASS_PATH_RELATIVE,
    ];

    protected $TokenizedContents;

    public function tokenize(): TokenizerInterface
    {
        $this->getTokenizedContents();

        return $this;
    }

    public function getTokenizedContents(): string
    {
        if ($this->TokenizedContents === null) {
            $this->getActorTemplateAnnotationTokenizer()->tokenize();
            $templateContents = $this->getActorTemplate()->getTokenizedContents();

            $tokenizedContents = str_replace(
                array_keys(self::REPLACEMENTS),
                array_values(self::REPLACEMENTS),
                $templateContents
            );

            $this->getActorTemplate()->applyTokenizedContents($tokenizedContents);
            $this->TokenizedContents = $this->getActorTemplate()->getTokenizedContents();
        }

        return $this->TokenizedContents;
    }
}
