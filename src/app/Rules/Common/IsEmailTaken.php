<?php

namespace App\Rules\Common;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Finance\User;

class IsEmailTaken implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
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
        $user = User::firstWhere('email', $value);
        if($user){
            if(count((array)$user) > 0){
                return false;
            }
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
        return '* The Email is Taken';
    }
}
