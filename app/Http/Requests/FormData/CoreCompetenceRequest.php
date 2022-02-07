<?php

namespace App\Http\Requests\FormData;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\CoreCompetence;

class CoreCompetenceRequest extends FormRequest
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
                'required', Rule::unique((new CoreCompetence)->getTable())->ignore($this->id ?? null)
            ]
        ];
    }
}
