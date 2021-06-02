<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use DB;

class AuthController extends Controller
{
    public function login(Request $request){
        // dd($request->all());
        if($request->usr == 'admin' && $request->pwd == 'admin')
            return response()->json(['status' => 2]);
        $customer = DB::table('customer')->where('USERNAME', $request->usr)->first();
        if($customer && Hash::check($request->pwd, $customer->PWD)){
            $request->session()->put('cid', $customer->ID);
            $request->session()->put('uname', $request->usr);
            return response()->json(['status' => 1, 'data' => $customer]);
        }
        return response()->json(['status' => 0]);
    }

    public function register(Request $request){
        $checkExist = Customer::where('USERNAME', $request->uname)->exists();
        if($checkExist)
            return response()->json(['status' => -1]);
        $total = Customer::count() + 1;
        $idLength = strlen(strval($total));
        $id = 'C' . str_pad(strval($total), 8 - $idLength, '0', STR_PAD_LEFT);
        $status = Customer::insert([
            'ID' => $id,
            'USERNAME' => $request->uname,
            'PWD' => Hash::make($request->pass),
            'PHONE' => $request->phone,
            'EMAIL' => $request->email,
            'FNAME' => $request->fname,
            'LNAME' => $request->lname,
        ]);
        if($status)
            return response()->json(['status' => 1]);
        return response()->json(['status' => 0]);
    }

    public function logout(Request $request){
        $request->session()->forget('uname');
        return response()->json(['status' => 1]);
    }
}
