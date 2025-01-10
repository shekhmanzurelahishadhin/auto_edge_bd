<?php

namespace App\Enums;

enum AdminUserType: string
{
    case SiteAdmin = 'super_admin';
    case DepartmentAdmin = 'department_admin';
    case OfficeAdmin = 'office_admin';
    case InstituteAdmin = 'institute_admin';
}
