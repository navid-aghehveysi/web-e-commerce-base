<?php

namespace App\Actions\Auth\Commands;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OTPRegisterUserCommand
{

    public function __construct(){}

    public function __invoke(array $data)
    {
        $credential = $data['credential'];
        $otp = mt_rand(100000, 999999);
        $token = Str::random(rand(60,70));
        return filter_var($credential, FILTER_VALIDATE_EMAIL)
            ? User::updateOrCreate(
                ['email' => $credential],
                ['otp' => $otp, 'otp_token' => $token]
            )
            : User::updateOrCreate(
                ['main_cellphone' => $credential],
                ['otp' => $otp, 'otp_token' => $token]
            );

    }
}
