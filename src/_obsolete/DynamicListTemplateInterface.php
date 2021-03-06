<?php

namespace Webflorist\FormFactory\Components\DynamicLists;

use Webflorist\FormFactory\Components\FormControls\Button;

interface DynamicListTemplateInterface
{

    /**
     * Manipulate this object to add the $removeItemButton needed for dynamicLists
     * and perform other needed modifications.
     *
     * @param DynamicList $dynamicList
     * @param Button $removeItemButton
     * @return void
     */
    function performDynamicListModifications(DynamicList $dynamicList, Button $removeItemButton);
}