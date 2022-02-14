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

            $rules = [];

            foreach($request->director as $key => $director) {

                if(!isset($director['first_name']) && !$director['first_name']){
                    $rules['director['.$key.'][first_name]'] = 'required';
                }
                if(!isset($director['last_name']) && !$director['last_name']){
                    $rules['director['.$key.'][last_name]'] = 'required';
                }
                if(!isset($director['email']) && !$director['email']){
                    $rules['director['.$key.'][email]'] = 'required';
                }
                if(!isset($director['phone_number']) && !$director['phone_number']){
                    $rules['director['.$key.'][phone_number]'] = 'required';
                }
                if(!isset($director['address']) && !$director['address']){
                    $rules['director['.$key.'][address]'] = 'required';
                }
                if(!isset($director['passport'])){
                    $rules['director['.$key.'][passport]'] = 'required';
                }
                if(!isset($director['identification'])){
                    $rules['director['.$key.'][identification]'] = 'required';
                }
                if(!isset($director['certificates'])){
                    $rules['director['.$key.'][certificates]'] = 'required';
                }

            }

            return $rules;

        }else{
            return [
                'director' => [
                    'required', 'array'
                ],
            ];
        }
        
    }

}
