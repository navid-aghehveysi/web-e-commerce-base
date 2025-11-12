<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\Commands\OTPRegisterUserCommand;
use App\Actions\Auth\Queries\OTPCheckedCommand;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProcessCredential;
use App\Http\Requests\Auth\ProcessOtpVerificationRequest;
use App\Notifications\SendEmailOtpToUser;
use Illuminate\Support\Facades\Auth;
use Throwable;


class OTPController extends Controller
{
    //
    public function initial()
    {
        return view('auth.otp.initial');
    }
    public function processCredential(
        OTPRegisterUserCommand $otpRegisterUserCommand,
        ProcessCredential $request
    )
    {
        $user = $otpRegisterUserCommand($request->validated());

//        $user->notify(new SendSmsOtpToUser($otp));
        $user->notify(new SendEmailOtpToUser($user->otp));

        return response()->json([
            'otpCode' => $user->otp,
            'otpToken' => $user->otp_token,
        ]);
    }

    public function processOtpVerification(
        OTPCheckedCommand $otpCheckedCommand,
        ProcessOtpVerificationRequest $request,
    )
    {
        try {
            $user = $otpCheckedCommand($request->validated());
            if(!$user) {
                return response()->json([
                    'message' => 'کد ورود نادرست می باشد',
                    'code' => 422
                ],422);
            }
            Auth::login($user);
            return response()->json([
                'url' => 'panel/dashboard'
            ]);

        }
        catch (Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

    }
}
