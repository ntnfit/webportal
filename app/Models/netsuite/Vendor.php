<?php

namespace App\Models\netsuite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Vendor extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'GTVendor';

    protected $fillable=[
        'VendorID'
      ,'VendorCode'
      ,'VendorName'
      ,'CyberCode'
      ,'VendorGroupRef'
      ,'CompanyName'
      ,'VendorType'
      ,'ShippingAddress'
      ,'BillingAddress'
      ,'Phone'
      ,'Email'
      ,'Fax'
      ,'TaxCode'
      ,'WebAddress'
      ,'Currency'
      ,'Balance'
      ,'PriceCode'
      ,'PaymentTerm'
      ,'CreditLimit'
      ,'Comments'
      ,'BranchRef'
      ,'CreatedDate'
      ,'CreatedBy'
      ,'LastModifiedDate'
      ,'LastModifiedBy'
      ,'Status'
      ,'Message'
      ,'SyncDate'
    ];
}
