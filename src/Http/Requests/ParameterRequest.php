<?php

namespace CeddyG\ClaraParameter\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Str;

class ParameterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    public function all($keys = null)
    {
        $aAttribute = parent::all($keys);
        
        if (isset($aAttribute['slug_parameter']))
        {
            $aAttribute['slug_parameter'] = Str::slug($aAttribute['slug_parameter']);
        }
        
        return $aAttribute;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'id_parameter'      => 'numeric',
                    'name_parameter'    => 'string|max:45',
                    'slug_parameter'    => 'string|max:45|unique:parameter',
                    'value_parameter'   => 'string|max:255',
                    'created_at'        => 'string',
                    'updated_at'        => 'string'
                ];
            }
            
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'id_parameter'      => 'numeric',
                    'name_parameter'    => 'string|max:45',
                    'slug_parameter'    => 'string|max:45|unique:parameter,slug_parameter,'.$this->parameter.',id_parameter',
                    'value_parameter'   => 'string|max:255',
                    'created_at'        => 'string',
                    'updated_at'        => 'string'
                ];
            }
            
            default: 
                return [];
        }
    }
}

