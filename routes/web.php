<?php

use App\Mail\WelcomeMail;
use App\Models\User;
use App\Notifications\SendEmailOtpToUser;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/test-email', function () {
//    Mail::raw('Test Email', function ($message) {
//       $message->to('navid@portfolio.com', 'navid')
//           ->subject('Test Email')
//           ->from('dev@portfolio.com' , 'support')
//           ->attach(storage_path('app/public/lg.png') ,[
//               'as' =>'image',
//               'mime' => 'image/png'
//           ]);
//    });
    $otp = rand(100000, 999999);
    Mail::to(
        new Address('navid@gmail.com' , 'navid')
    )
        ->send(new \App\Mail\OTP($otp));

})->name('test-email');
