<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Mail\OTPMail;
use Mail;
use Illuminate\Http\Request;
use Cache;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' , 'isVerified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function OTP(){

        return Cache::get($this->OTPKey());
    }

    public function OTPKey(){

        return "OTP_for_{$this->id}";
    }

    public function cacheTheOTP(){

        $OTP =rand(100000,999999);
            Cache::put([$this->OTPKey() => $OTP],now()->addSeconds(30));

            return $OTP;
    }


    public function sendOTP($via){

        
      if($via == 'via_sms'){


      }else{

        Mail::to('sareekacheekuri9@gmail.com')->send(new OTPMail($this->cacheTheOTP()));
      }
       
       
    }

    public function routeNotificationForKarix()
{
    return $this->phone;
}
    
}
