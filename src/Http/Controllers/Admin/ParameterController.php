<?php

namespace CeddyG\ClaraParameter\Http\Controllers\Admin;

use CeddyG\Clara\Http\Controllers\ContentManagerController;

use CeddyG\ClaraParameter\Repositories\ParameterRepository;

class ParameterController extends ContentManagerController
{
    public function __construct(ParameterRepository $oRepository)
    {
        $this->sPath            = 'admin/parameter';
        $this->sPathRedirect    = 'admin/parameter';
        $this->sName            = __('parameter.parameter');
        
        $this->oRepository  = $oRepository;
        $this->sRequest     = 'CeddyG\ClaraParameter\Http\Requests\ParameterRequest';
    }
}
