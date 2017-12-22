<?php

namespace Nicat\FormBuilder\Elements\Traits;


trait CanAutoSubmit
{

    /**
     * Enables automatic submission of form,
     * when 'change' event is fired.
     *
     * @return $this
     */
    public function autoSubmit() {
        $this->data('autosubmit','onChange');
        return $this;
    }

}