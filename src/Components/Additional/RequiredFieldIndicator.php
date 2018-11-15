<?php

namespace Webflorist\FormFactory\Components\Additional;

use Webflorist\FormFactory\FormFactory;
use Webflorist\HtmlFactory\Elements\SupElement;

class RequiredFieldIndicator extends SupElement
{

    /**
     * Gets called during construction.
     * Overwrite to perform setup-functionality.
     */
    protected function setUp()
    {
        $this->appendContent('*');
        app(FormFactory::class)->requiredFieldIndicatorUsed = true;
    }

}