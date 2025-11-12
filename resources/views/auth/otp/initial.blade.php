@extends('auth.layouts.master')
@push('vite-scripts')
    @vite('resources/js/auth/auth.js')
@endpush
@section('content')
    <section class="main py-8 px-2">
        <section class="flex items-center justify-center">
            <section class="form-register w-[600px] p-2 border">


                <div x-data="otpFlow">

                    <section class="space-y-6">

                        <template x-if="otpSend">
                            <section class="space-y-4 ">

                                <div class="flex flex-col space-y-2">
                                    <label for="credential" class="flex items-center justify-between">
                                        <span>شماره موبایل یا ایمیل خود رو وارد نمایید</span>
                                        <span x-text="error" class="text-red-400"></span>
                                    </label>
                                    <input type="text" x-model="credential" class="input" id="credential"/>
                                </div>

                                <button @click="processCredential('{{ route('auth.opt.process.credential') }}')"
                                        class="btn
                                    bg-amber-400
                                    text-white
                                    flex
                                    items-center"
                                >
                                    <span>ارسال</span>
                                    <span x-show="loading">
                                        <div class="flex items-end gap-1 h-5" role="status" aria-busy="true">
                                          <span class="w-2 h-2 rounded-full bg-red-500 animate-bounce" style="animation-delay:0ms"></span>
                                          <span class="w-2 h-2 rounded-full bg-red-500 animate-bounce" style="animation-delay:150ms"></span>
                                          <span class="w-2 h-2 rounded-full bg-red-500 animate-bounce" style="animation-delay:300ms"></span>
                                        </div>
                                    </span>
                                </button>

                            </section>
                        </template>


                        <template x-if="!otpSend">
                            <section  class="otp-form space-y-4" >
                                <div class="flex flex-col space-y-2">
                                    <label for="primary_phone_number" class="flex items-center justify-between">
                                        <span>کد ورود</span>
                                        <span x-text="error" class="text-rose-400"></span>
                                    </label>
                                    <input type="text" x-model="otpCode" name="otp"
                                           id="otp" class="input"/>
                                </div>

                                <div class="flex items-center justify-between py-1">
                                    <button @click="processOtpVerification('{{ route('auth.opt.process.otp.verification') }}')" class="btn bg-amber-400
                                    border-none
                                    text-white flex
                                    items-center">اعتبارسنجی کد تایید
                                        <span x-show="loading">
                                                <div class="flex items-end gap-1 h-5" role="status" aria-busy="true">
                                                  <span class="w-2 h-2 rounded-full bg-red-500 animate-bounce" style="animation-delay:0ms"></span>
                                                  <span class="w-2 h-2 rounded-full bg-red-500 animate-bounce" style="animation-delay:150ms"></span>
                                                  <span class="w-2 h-2 rounded-full bg-red-500 animate-bounce" style="animation-delay:300ms"></span>
                                                </div>
                                            </span>
                                    </button>
                                    <template x-if="timer.startTime">
                                        <p class="btn bg-gray-200 border-none" >
                                             زمان باقی مانده
                                            <span x-text="timer.timeFormatted"></span>
                                        </p>
                                    </template>
                                    <template x-if="timer.endTime">
                                        <button @click="reSendOtp" class="btn bg-black text-white">ارسال مجدد </button>
                                    </template>
                                </div>

                                </div>

                            </section>
                        </template>
                    </section>
                </div>
            </section>
        </section>
    </section>
@endsection
