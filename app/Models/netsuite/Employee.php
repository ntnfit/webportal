<?php

namespace App\Models\netsuite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'GTemployee';

    protected $fillable = [
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
    ,'Department'
    ,'Section'
    ,'Location'
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
