<?php

namespace Sparkout\SparkoutLogin;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sparkout\SparkoutLogin\SparkoutLogin
 */
class SparkoutLoginFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sparkout-login';
    }
}
