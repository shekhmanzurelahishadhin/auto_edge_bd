<?php

namespace App\Enums;

enum UserType: string
{
    case Teacher = 'teacher';
    case Officer = 'officer';
    case Staff = 'staff';
}
