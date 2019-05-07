<?php

use ClaraParameter;

function param($sSlug, $sDefault = '')
{
    $sValue = ClaraParameter::getValueBySlug($sSlug);
    
    return $sValue != '' ? $sValue : $sDefault;
}