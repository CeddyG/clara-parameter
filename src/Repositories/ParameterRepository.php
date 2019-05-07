<?php

namespace CeddyG\ClaraParameter\Repositories;

use CeddyG\QueryBuilderRepository\QueryBuilderRepository;

class ParameterRepository extends QueryBuilderRepository
{
    protected $sTable = 'parameter';

    protected $sPrimaryKey = 'id_parameter';
    
    protected $sDateFormatToGet = 'd/m/Y';
    
    protected $aRelations = [
        
    ];

    protected $aFillable = [
        'name_parameter',
		'slug_parameter',
		'value_parameter'
    ];
    
    protected $aCache = [];

    public function getValueBySlug($sSlug)
    {
        if (!isset($this->aCache[$sSlug]))
        {
            $oParameters = $this->findByField('slug_parameter', $sSlug, ['value_parameter']);
            
            $this->aCache[$sSlug] = $oParameters->isNotEmpty()
                ? $oParameters->first()->value_parameter
                : '';
        }
        
        return $this->aCache[$sSlug];
    }

}
