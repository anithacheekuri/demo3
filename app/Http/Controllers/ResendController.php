<?php

namespace App\Http\Controllers;
use App\Http\Requests\ResentOTPReuest;


class ResendController extends Controller
{
    public function resendotp(ResentOTPReuest $request){

// resend

auth()->user()->sendOTP($request->via);

return back()->with('message','your new otp');
//cache
//rediect with message
      
    }
}
