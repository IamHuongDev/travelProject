<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\LoginRequest;
use App\Http\Requests\Customer\RegisterRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function Register(RegisterRequest $request)
    {
        $data = $request->all();

        $name = $request->full_name;

        $parts = explode(" ", $name);

        if (count($parts) > 1) {
            $data['last_name'] = array_pop($parts);
            $data['first_name'] = implode(" ", $parts);
        } else {
            $data['last_name']  = $name;
            $data['first_name'] = " ";
        }

        $data['hash'] = Str::uuid();

        $data['password'] = bcrypt($data['password']);

        $data['status'] = 1;

        Customer::create($data);

        return response()->json(['data' => true]);
    }


    public function Login(LoginRequest $request)
    {
        $data = $request->all();

        $checkLogin = Auth::guard('customer')->attempt($data);

        if ($checkLogin) {
            $customer = Auth::guard('customer')->user();
            if ($customer->status == 0) {
                Auth::guard('customer')->logout();

                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 2]);
            }
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function Logout()
    {
        Auth::guard('customer')->logout();

        return redirect('/');
    }


}
