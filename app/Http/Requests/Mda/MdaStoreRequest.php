<?php

namespace App\Http\Requests\Mda;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Rules\CheckMdaHeadRule;

class MdaStoreRequest extends FormRequest
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
                'required', new CheckMdaHeadRule($this->mda_type, $this->role)
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
                'required', Rule::unique((new User)->getTable())->ignore($this->route()->user ?? null)
            ],
            'phone_number' => [
                'required'
            ]
        ];
    }
}
