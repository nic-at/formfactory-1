<?php

use Illuminate\Support\Debug\Dumper;

if ( ! function_exists('od'))
{
    /**
     * Dump the passed object and end the script without dying
     *
     * @param  mixed
     * @return void
     */
    function od()
    {
        array_map(function($x) { (new Dumper)->dump($x); }, func_get_args());


    }


}