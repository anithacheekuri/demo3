<?php

namespace App\Http\Controllers;


use App\User;
use Cache;
use App\Http\Requests\OTPrequest;
class Verifycontroller extends Controller
{
    //
    public function verifyOTP(OTPrequest $request)
    {
    
      
                   if(request('OTP') ==  auth()->user()->OTP()){
       
   
                    auth()->user()->update(['isVerified' => true]);

                    return redirect('/home');

                   }
                     return back()->withErrors('OTP is invalid or expired');
    }

    //showverifyPage
    public function showverifyPage(){

        return view('verifyOTP');
    }

    public function checkingOTP(){
echo "dd";
       // return view('home');
    }
}
