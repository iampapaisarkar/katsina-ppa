<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;

class PlanYearCheckRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $message;

    public function __construct()
    {
        //
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
        if(Plan::where('uploaded_by', Auth::user()->id)->exists()){
            if(Plan::where('uploaded_by', Auth::user()->id)->where('year', $value)->exists()){
                $this->message = 'You have already upload a plan under '.$value.' year. Please select another one.';
                return false;
            }else{
                return true;
            }
        }else{
            return true;
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
