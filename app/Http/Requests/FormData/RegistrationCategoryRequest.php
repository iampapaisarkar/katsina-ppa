<?php

namespace App\Http\Requests\FormData;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationCategoryRequest extends FormRequest
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
            'title' => [
                'required'
            ],
            'code' => [
                'required'
                // , Rule::unique((new OrganizationType)->getTable())->ignore($this->id ?? null)
            ],
            'registration_fee' => [
                'required'
            ],
            'renewal_fee' => [
                'required'
            ],
            'threshold' => [
                'required'
            ]
        ];
    }
}
