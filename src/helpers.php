<?php

use CeddyG\ClaraParameter\Facades\ClaraParameter;

function param($sSlug, $sDefault = '')
{
    $sValue = ClaraParameter::getValueBySlug($sSlug);
    
    return $sValue != '' ? $sValue : $sDefault;
}