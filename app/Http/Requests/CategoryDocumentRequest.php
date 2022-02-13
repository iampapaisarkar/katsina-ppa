<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryDocumentRequest extends FormRequest
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
            'registration_category_id' => [
                'required'
            ],
            // 'attachment_1' => [
            //     'required'
            // ],
            // 'attachment_2' => [
            //     'required'
            // ],
            // 'attachment_3' => [
            //     'required'
            // ],
            // 'attachment_4' => [
            //     'required'
            // ],
            // 'attachment_5' => [
            //     'required'
            // ],
            // 'attachment_6' => [
            //     'required'
            // ],
            // 'attachment_7' => [
            //     'required'
            // ],
            // 'attachment_8' => [
            //     'required'
            // ],
            // 'attachment_9' => [
            //     'required'
            // ]
        ];
    }
}
