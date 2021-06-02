<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\CreditCard;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getCustomerInfo(Request $request){
        return Customer::select('*')->where('ID', $request->cid)
        ->leftJoin('credit_card', 'ID', 'CID')
        ->first();
    }

    public function saveCustomerInfo(Request $request){
        Customer::where('ID', $request->cid)->update([
            'USERNAME' => $request->cuname,
            'PHONE' => $request->cphone,
            'EMAIL' => $request->cemail,
            'FNAME' => $request->cfname,
            'LNAME' => $request->clname
        ]);
        $checkExist = CreditCard::where('CID', $request->cid)->exists();
        if($checkExist){
            CreditCard::where('CID', $request->cid)->update([
                'CCODE' => $request->ccreditcode,
                'EXPIRATION_DATE' => $request->cedate,
                'ONAME' => $request->cowner,
                'BNAME' => $request->cbname
            ]);
        }
        else{
            CreditCard::insert([
                'CCODE' => $request->ccreditcode,
                'EXPIRATION_DATE' => $request->cedate,
                'ONAME' => $request->cowner,
                'BNAME' => $request->cbname,
                'BRANCH_NAME' => null,
                'CID' => $request->cid
            ]);
        }
        return response()->json(['status' => 1]);
    }
}
