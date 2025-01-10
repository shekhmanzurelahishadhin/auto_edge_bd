<?php

use App\Mail\NewUserPasswordSend;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

if (! function_exists('create_user')) {

    /**
     * description
     */
    function create_user($name, $phone, $email)
    {
        $password = Str::password(10);
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->phone = $phone;

        $data['name'] = $name;
        $data['email'] = $email;
        $data['password'] = $password;
        $data['appURL'] = env('APP_URL');
        Mail::to($email)->send(new NewUserPasswordSend($data));
        $user->save();

        return $user;
    }
}
