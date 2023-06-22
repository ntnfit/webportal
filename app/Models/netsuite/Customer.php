<?php

namespace App\Models\netsuite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Customer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'GTCustomer';

    protected $fillable = [
        'CustomerID',
        'CustomerCode',
        'CustomerName',
        'CyberCode',
        'CustomerGroupRef',
        'CustomerType',
        'ShippingAddress',
        'BillingAddress',
        'Phone','Email',
        'Currency',
        'Balance',
        'PriceCode',
        'PaymentTerm',
        'CreditLimit',
        'Comments',
        'CreatedDate',
        'CreatedBy',
        'LastModifiedBy',
        'SyncDate'
    ];
}
