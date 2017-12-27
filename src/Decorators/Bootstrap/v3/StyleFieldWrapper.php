<?php

namespace Nicat\FormBuilder\Decorators\Bootstrap\v3;

use Nicat\FormBuilder\Components\FieldWrapper;
use Nicat\FormBuilder\Elements\RadioInputElement;
use Nicat\HtmlBuilder\Decorators\Abstracts\Decorator;
use Nicat\HtmlBuilder\Elements\Abstracts\Element;
use Nicat\HtmlBuilder\Elements\CheckboxInputElement;

class StyleFieldWrapper extends Decorator
{

    /**
     * Returns an array of frontend-framework-ids, this decorator is specific for.
     *
     * @return string[]
     */
    public static function getSupportedFrameworks(): array
    {
        return [
            'bootstrap:3'
        ];
    }

    /**
     * Returns an array of class-names of elements, that should be decorated by this decorator.
     *
     * @return string[]
     */
    public static function getSupportedElements(): array
    {
        return [
            FieldWrapper::class
        ];
    }

    /**
     * Decorates the element.
     *
     * @param Element $element
     */
    public static function decorate(Element $element)
    {

        /** @var FieldWrapper $element */
        $element->addClass(self::getWrapperClassForField($element->field));
    }

    /**
     * Returns the correct class for the field's wrapper.
     *
     * @param Element $field
     * @return string
     */
    private static function getWrapperClassForField(Element $field)
    {
        if (is_a($field,CheckboxInputElement::class)) {
            return 'checkbox';
        }

        if (is_a($field,RadioInputElement::class)) {
            return 'radio';
        }

        return 'form-group';
    }
}