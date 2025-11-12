<?php

namespace App\Actions\Auth\Queries;

use App\Repositories\Eloquent\User\UserReadOnlyRepository;

class OTPCheckedCommand
{

    public function __construct(protected UserReadOnlyRepository $repository){}

    public function __invoke(array $data)
    {
        ['otp' => $otp, 'otp_token' => $otp_token] = $data;
        $user = $this->repository->query()->where('otp_token', $otp_token)->first();
        if (!$user) {
            return false;
        }
        if((string)$user->otp === (string)$otp){
            return $user;
        }
        return false;
    }
}
