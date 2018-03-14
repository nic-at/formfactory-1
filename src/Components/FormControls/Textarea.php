<?php

namespace Nicat\FormBuilder\Components\FormControls;

use Nicat\FormBuilder\Utilities\AutoTranslation\AutoTranslationInterface;
use Nicat\FormBuilder\Utilities\FieldValues\FieldValueProcessorInterface;
use Nicat\FormBuilder\Components\Traits\CanAutoSubmit;
use Nicat\FormBuilder\Components\Traits\CanHaveErrors;
use Nicat\FormBuilder\Components\Traits\CanHaveHelpText;
use Nicat\FormBuilder\Components\Traits\CanHaveLabel;
use Nicat\FormBuilder\Components\Traits\CanHaveRules;
use Nicat\FormBuilder\Components\Traits\CanPerformAjaxValidation;
use Nicat\FormBuilder\Components\Traits\UsesAutoTranslation;
use Nicat\HtmlBuilder\Elements\TextareaElement;

class Textarea extends TextareaElement implements FieldValueProcessorInterface, AutoTranslationInterface
{
    use CanHaveLabel,
        CanHaveRules,
        CanHaveHelpText,
        UsesAutoTranslation,
        CanHaveErrors,
        CanAutoSubmit,
        CanPerformAjaxValidation;

    /**
     * Apply a value to a field.
     *
     * @param $value
     */
    public function applyFieldValue($value)
    {
        $this->clearContent();
        $this->content($value);
    }
}