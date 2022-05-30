<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyDetailRequest extends FormRequest
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
    public function rules()
    {
        return [
            'area_of_core_competence' => [
                'required'
            ],
            'type_of_organization' => [
                'required'
            ],
            'company_name' => [
                'required'
            ],
            'cac_number' => [
                'required'
            ],
            'date_of_incorporation' => [
                'required'
            ],
            'share_capital' => [
                'required'
            ],
            'address' => [
                'required'
            ],
            'landmark' => [
                'required'
            ],
            'city' => [
                'required'
            ],
            'state' => [
                'required'
            ],
            'country' => [
                'required'
            ],
            'first_name' => [
                'required'
            ],
            'last_name' => [
                'required'
            ],
            'email' => [
                'required'
            ],
            'phone_number' => [
                'required'
            ],
            'position' => [
                'required'
            ]
        ];
    }
}
