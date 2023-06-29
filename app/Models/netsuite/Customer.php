<?php

namespace App\Models\netsuite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'GTCustomer';
    protected $fillable= ['CustomerID'
    ,'CustomerCode'
    ,'CustomerName'
    ,'CyberCode'
    ,'CustomerGroupRef'
    ,'CustomerType'
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
    ,'Booth'
    ,'BranchRef'
    ,'CreatedDate'
    ,'CreatedBy'
    ,'LastModifiedDate'
    ,'LastModifiedBy'
    ,'Status'
    ,'Message'
    ,'SyncDate'];
}
