<?php

namespace App\Http\Controllers;

use App\Http\Requests\Partner\LoginRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Partner\RegisterRequest;
use Illuminate\Support\ServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewRegister()
    {
        return view('Partner.register');
    }


    public function viewLogin()
    {
        return view('Partner.login');
    }

    public function Register(RegisterRequest $request)
    {
        $data = $request->all();

        $parts = explode(" ", $request->full_name);
        if(count($parts) > 1){
            $lastname = array_pop($parts);
            $firstname = implode(" ", $parts);
        } else {
            $firstname = $request->full_name;
            $lastname = " ";
        }

        $data['first_name'] = $firstname;
        $data['last_name'] = $lastname;

        $data['hash'] = Str::uuid();

        $data['password'] = bcrypt($request->password);

        Partner::create($data);

        return response()->json(['status' => true]);
    }


    public function Login(LoginRequest $request)
    {
        $data = $request->all();

        Auth::guard('partner')->attempt($data);

        if(Auth::guard('partner')->check()){
            $partner = Auth::guard('partner')->user();
            if($partner->is_active == 0){
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 2]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function Logout()
    {
        Auth::guard('partner')->logout();

        return redirect('/partner/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
