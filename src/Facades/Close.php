<?php

namespace Lioneagle\Close\Facades;

use Illuminate\Support\Facades\Facade;
use Lioneagle\Close\Leads\Leads;

/**
 * @method static Leads leads()
 */
class Close extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Lioneagle\Close\Close::class;
    }
}