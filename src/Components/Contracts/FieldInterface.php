<?php

namespace Nicat\FormFactory\Components\Contracts;

/**
 * This interface defines a "Field".
 * A Field is a form control, that has a 'name' attribute is not a button.
 * (<input>, <select>, <textarea>)
 *
 * @package Nicat\FormFactory
 */
interface FieldInterface
{

    /**
     * Set array of errors for this Field.
     * (Omit for automatic adoption from session)
     * Set to false to avoid rendering of errors.
     *
     * @param array|false $errors
     * @return $this
     */
    public function errors($errors);

    /**
     * Set rules for this field in Laravel-syntax (either in array- or string-format)
     * (omit for automatic adoption from request-object)
     *
     * @param string|array $rules
     * @return $this
     */
    public function rules($rules);

    /**
     * Does this field have any rules set?
     *
     * @return bool
     */
    public function hasRules() : bool;

    /**
     * Get the rules for this field.
     *
     * @return array
     */
    public function getRules() : array;

    /**
     * Can this Field have a label?
     *
     * @return bool
     */
    public function canHaveLabel(): bool;

    /**
     * Apply a value to a field.
     *
     * @param $value
     */
    public function applyFieldValue($value);

    /**
     * Does this field currently have a value set?
     *
     * @return bool
     */
    public function fieldHasValue();


}