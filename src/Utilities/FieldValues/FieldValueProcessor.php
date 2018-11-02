<?php

namespace Nicat\FormFactory\Utilities\FieldValues;

use Nicat\FormFactory\Components\Contracts\FieldInterface;
use Nicat\FormFactory\FormFactory;
use Nicat\FormFactory\Utilities\Forms\FormInstance;
use Nicat\HtmlFactory\Elements\Abstracts\Element;

/**
 * Applies default-values, that were set via the 'values' method on the Form (if the form was not submitted during last request).
 * Applies submitted values (if the form was submitted during last request).
 *
 * Class FieldValueProcessor
 * @package Nicat\FormFactory
 */
class FieldValueProcessor
{

    /**
     * Apply values to $field.
     *
     * @param FieldInterface|Element $field
     * @throws \Nicat\FormFactory\Exceptions\OpenElementNotFoundException
     */
    public static function process(FieldInterface $field)
    {

        /** @var FormInstance $openForm */
        $openForm = FormFactory::singleton()->getOpenForm();

        $fieldName = $field->attributes->name;

        // Submitted values always take precedence.
        if ($openForm->wasSubmitted && $openForm->values->fieldHasSubmittedValue($fieldName)) {
            $field->applyFieldValue($openForm->values->getSubmittedValueForField($fieldName));
            return;
        }

        // If the field already has a value set (e.g. set via the value()-method),
        // we leave it at that.
        if ($field->fieldHasValue()) {
            return;
        }

        // If the form was not submitted, but a value for the this field was stated via
        // the values()-method of the Form::open() call, we apply this default value.
        if (!$openForm->wasSubmitted && $openForm->values->fieldHasDefaultValue($fieldName)) {
            $field->applyFieldValue($openForm->values->getDefaultValueForField($fieldName));
        }
    }

}