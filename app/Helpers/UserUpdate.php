<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

if (! function_exists('update_user')) {

    /**
     * description
     */
    function update_user($id, $name, $phone, $email)
    {
        $user = User::findOrFail($id);
        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        $user->save();

        return $user;
    }
}
