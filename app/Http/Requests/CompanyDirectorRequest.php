<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CompanyDirectorRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if($request->director){
            return [
                'director.*.first_name' => [
                    'required'
                ],
                'director.*.last_name' => [
                    'required'
                ],
                'director.*.email' => [
                    'required'
                ],
                'director.*.phone_number' => [
                    'required'
                ],
                'director.*.address' => [
                    'required'
                ],
                'director.*.passport' => [
                    'required'
                ],
                'director.*.identification' => [
                    'required'
                ],
                'director.*.certificates' => [
                    'required'
                ]
            ];
        }else{
            return [
                'director' => [
                    'required', 'array'
                ],
            ];
        }
        
    }
}
