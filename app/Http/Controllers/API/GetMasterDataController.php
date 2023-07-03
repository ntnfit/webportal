<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Models\netsuite\Customer;
use App\Models\netsuite\Vendor;
use App\Models\netsuite\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
class GetMasterDataController extends Controller
{
     /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
    public function VendorID($id)
    {
        $vendor = Vendor::where('VendorID',$id)->get();

    return response($vendor,200);
    }

}
