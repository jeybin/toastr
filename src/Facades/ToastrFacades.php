<?php

namespace Jeybin\Toastr\Facades;

use Illuminate\Support\Facades\Facade;

class ToastrFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'toastr';
    }
}