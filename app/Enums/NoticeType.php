<?php

namespace App\Enums;

enum NoticeType: string
{
    case OfficeOrder = 'office_order';
    case Teacher = 'teacher';
    case Student = 'student';
    case Admission = 'admission';
}
