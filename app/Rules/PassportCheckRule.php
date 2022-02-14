<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\CompanyDirector;

class PassportCheckRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $id;
    private $key;
    private $message;

    public function __construct($id = null, $key = null)
    {
        $this->id = $id;
        $this->key = $key;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
     public function passes($attribute, $value)
    {
        $CompanyDirector = CompanyDirector::where('id', $this->id)->first();

        if($CompanyDirector && $CompanyDirector->passport){
            return true;
        }else{
            $this->message = 'The director['.$this->id.'][passport] field is required.';
            return false;
        }
        
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
