<?php

namespace Nicat\FormFactory\Components\FormControls;

use Nicat\FormFactory\Components\Traits\FieldTrait;
use Nicat\FormFactory\Components\Contracts\FieldInterface;
use Nicat\FormFactory\Components\Traits\FormControlTrait;
use Nicat\FormFactory\Components\Contracts\FormControlInterface;
use Nicat\FormFactory\Components\Traits\HelpTextTrait;
use Nicat\FormFactory\Components\Contracts\HelpTextInterface;
use Nicat\FormFactory\Components\Traits\LabelTrait;
use Nicat\FormFactory\Components\Contracts\LabelInterface;
use Nicat\FormFactory\Components\Contracts\AutoTranslationInterface;
use Nicat\FormFactory\Components\Traits\AutoTranslationTrait;
use Nicat\HtmlFactory\Elements\TextareaElement;

class Textarea
    extends TextareaElement
    implements FormControlInterface, FieldInterface, LabelInterface, HelpTextInterface, AutoTranslationInterface
{
    use FormControlTrait,
        FieldTrait,
        LabelTrait,
        HelpTextTrait,
        AutoTranslationTrait;

    /**
     * Textarea constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        parent::__construct();
        $this->name($name);
    }

    /**
     * Apply a value to a field.
     *
     * @param $value
     */
    public function applyFieldValue($value)
    {
        $this->content->clear();
        $this->content($value);
    }

    /**
     * Does this field currently have a value set?
     *
     * @return bool
     */
    public function fieldHasValue()
    {
        return $this->content->hasContent();
    }
}