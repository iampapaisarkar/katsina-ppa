<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanUplaodRequest extends FormRequest
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
            'plan_year' => [
                'required'
            ],
            'plan_mda' => [
                'required'
            ],
            'plan' => [
                'required', 'mimes:xlsx, csv, xls'
            ]
        ];
    }
}
