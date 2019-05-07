<?php

namespace CeddyG\ClaraParameter\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CeddyG\ClaraParameter\Repositories\ParameterRepository
 */
class ClaraParameter extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'clara.parameter';
    }
}
