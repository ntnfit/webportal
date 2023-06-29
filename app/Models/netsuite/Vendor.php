<?php

namespace App\Models\netsuite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'GTVendor';
    protected $fillable= [
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
