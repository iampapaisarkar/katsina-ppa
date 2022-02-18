<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\CategoryDocuments;

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
        $rules = [];
        $rules['registration_category_id'] = ['required'];

        $CategoryDocument = CategoryDocuments::where('id', $this->id)->first();

        if($CategoryDocument && $CategoryDocument->attachment_1){
            $rules['attachment_1'] = ['nullable'];
        }else{
            $rules['attachment_1'] = ['required'];
        }

        if($CategoryDocument && $CategoryDocument->attachment_2){
            $rules['attachment_2'] = ['nullable'];
        }else{
            $rules['attachment_2'] = ['required'];
        }

        if($CategoryDocument && $CategoryDocument->attachment_3){
            $rules['attachment_3'] = ['nullable'];
        }else{
            $rules['attachment_3'] = ['required'];
        }

        if($CategoryDocument && $CategoryDocument->attachment_4){
            $rules['attachment_4'] = ['nullable'];
        }else{
            $rules['attachment_4'] = ['required'];
        }

        if($CategoryDocument && $CategoryDocument->attachment_5){
            $rules['attachment_5'] = ['nullable'];
        }else{
            $rules['attachment_5'] = ['required'];
        }

        if($CategoryDocument && $CategoryDocument->attachment_6){
            $rules['attachment_6'] = ['nullable'];
        }else{
            $rules['attachment_6'] = ['required'];
        }

        if($CategoryDocument && $CategoryDocument->attachment_7){
            $rules['attachment_7'] = ['nullable'];
        }else{
            $rules['attachment_7'] = ['required'];
        }

        if($CategoryDocument && $CategoryDocument->attachment_8){
            $rules['attachment_8'] = ['nullable'];
        }else{
            $rules['attachment_8'] = ['required'];
        }

        if($CategoryDocument && $CategoryDocument->attachment_9){
            $rules['attachment_9'] = ['nullable'];
        }else{
            $rules['attachment_9'] = ['required'];
        }

        return $rules;
    }
}
