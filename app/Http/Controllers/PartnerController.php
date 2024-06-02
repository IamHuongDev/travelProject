<?php

namespace App\Http\Controllers;

use App\Http\Requests\Partner\CheckEmailRequest;
use App\Http\Requests\Partner\LoginRequest;
use App\Http\Requests\Partner\ResetPasswordRequest;
use App\Jobs\ResetPasswordJob;
use App\Jobs\sendMailJob;
use App\Mail\RegisterMail;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Partner\RegisterRequest;
use Illuminate\Support\ServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
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

        $parts = explode(" ", $data['full_name']);
        if (count($parts) > 1) {
            $lastname = array_pop($parts);
            $firstname = implode(" ", $parts);
        } else {
            $firstname = $data['full_name'];
            $lastname = " ";
        }

        $data['first_name'] = $firstname;
        $data['last_name'] = $lastname;

        $data['hash'] = Str::uuid();

        $data['password'] = bcrypt($data['password']);

        Partner::create($data);

        $dataMail['full_name'] = $firstname . ' ' . $lastname;
        $dataMail['hash'] = $data['hash'];

        sendMailJob::dispatch($request->email, 'Mail thông báo đăng ký tài khoản thành công' . Carbon::now(), $dataMail);

        return response()->json(['status' => true]);
    }


    public function Login(LoginRequest $request)
    {
        $data = $request->all();

        Auth::guard('partner')->attempt($data);

        if (Auth::guard('partner')->check()) {
            $partner = Auth::guard('partner')->user();
            if ($partner->is_active == 0) {
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

    public function Active($hash){
        $partner = Partner::where('hash', $hash)->first();

        if($partner){
            if($partner->is_active == 0) {

                $partner->is_active = 1;
                $partner->save();

                toastr()->success('Tài khoản đã kích hoạt thành công');
                return redirect('/partner/login');

            } else {
                toastr()->error('Tài khoản đã kích hoạt trước đó');
                return redirect('/partner/login');
            }
        } else {
            toastr()->error('Đường dẫn không tồn tại');
            return redirect('/partner/register');
        }
    }

    public function checkEmail(CheckEmailRequest $request)
    {
        $email = $request->email;

        $findEmail = Partner::where('email', $email)->first();

        if ($findEmail) {
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }

    }

    public function ResetPassword()
    {
        return view('Partner.reset-password');
    }
    public function SendMailResetPassword($email)
    {
        $partner = Partner::where('email', $email)->first();

        if ($partner) {

            if($partner->is_reset){
                return response()->json(['status' => true]);
            }

            $partner->is_reset = 1;
            $partner->hash_reset = Str::uuid();
            $partner->save();

            $dataMail['full_name'] = $partner->first_name.' '. $partner->last_name;
            $dataMail['hash_reset'] = $partner->hash_reset;

            ResetPasswordJob::dispatch( $email, 'Mail thông báo reset mật khẩu'. Carbon::now(), $dataMail);

            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function viewReset($hash)
    {
        return view('Partner.resetPass', compact('hash'));
    }


    public function ResetPasswordChange(ResetPasswordRequest $request)
    {
        $hash = $request->hash;

        $partner = Partner::where('hash_reset', $hash)->where('is_reset', 1)->first();

        if($partner){
            $partner->hash_reset = null;
            $partner->is_reset = 0;
            $partner->password = bcrypt($request->password);

            $partner->save();

            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }



}
