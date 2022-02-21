<?php

namespace App\Http\Requests\Mda;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class MdaUpdateRequest extends FormRequest
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
            'mda_type' => [
                'required'
            ],
            'role' => [
                'required'
            ],
            'first_name' => [
                'required'
            ],
            'last_name' => [
                'required'
            ],
            'email' => [
                'required', Rule::unique((new User)->getTable())->ignore($this->id ?? null)
            ],
            'phone_number' => [
                'required'
            ]
        ];
    }
}
