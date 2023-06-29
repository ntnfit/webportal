<?php

namespace App\Models\netsuite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'GTEmployee';
    protected $fillable= [
           'EmployeeID'
           ,'EmployeeCode'
           ,'EmployeeName'
           ,'CyberCode'
           ,'JobTitles'
           ,'Email'
           ,'Phone'
           ,'MobilePhone'
           ,'OfficePhone'
           ,'Branch'
           ,'Division'
           ,'Department'
           ,'Section'
           ,'Roles'
           ,'CreatedDate'
           ,'CreatedBy'
           ,'LastModifiedDate'
           ,'LastModifiedBy'
           ,'Status'
           ,'Message'
           ,'SyncDate'
    ];
}
