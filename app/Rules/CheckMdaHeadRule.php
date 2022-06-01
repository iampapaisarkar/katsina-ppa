<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Mda;
use App\Models\Role;
use App\Models\User;

class CheckMdaHeadRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $id;
    private $role;
    private $message;

    public function __construct($id = null, $role = null)
    {
        $this->id = $id;
        $this->role = $role;
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

        $mda = Mda::where('id', $this->id)->first();

        $existsMDAHead = User::join('user_roles', 'user_roles.user_id', 'users.id')
        ->join('roles', 'roles.id', 'user_roles.role_id')
        ->join('mdas', 'mdas.id', 'users.mda')
        ->where('mdas.id', $this->id)
        ->where('roles.code', 'mda_head');

        if($existsMDAHead->exists()){
            $this->message = 'You can not add more HEAD for '.$mda->title.' MDA.';
            return false;
        }
        else{
            return true;
        }

        // $mda = Mda::where('id', $this->id)->first();
        // $role = Role::where('id', $this->role)->first();
        // if($role->code == 'mda_head'){

        //     if($mda && $mda->has_head == true){
        //         $this->message = 'You can not add more HEAD for '.$mda->title.' MDA.';
        //         return false;
        //     }else{
        //         return true;
        //     }

        // }
        // return true;
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
