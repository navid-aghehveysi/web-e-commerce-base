import {Axios, AxiosError} from "axios";
import CountDownTimer from './CountDownTimer';

export default function OtpFlow() {

    const timer = CountDownTimer(1);
    return {
        credential: '',
        otpSend: true,
        error: '',
        otpCode:'',
        otpToken: '',
        loading: false,
        url: '',
        timer,
        responseEnd: false,


        async processCredential(url) {
            this.url = url;
            try {
                this.loading = true
                this.error = ''
                const res = await  axios.post(
                    this.url,
                    {
                        'credential': this.credential
                    }
                )

                this.otpToken = res.data.otpToken;
                console.log(res.data)
                this.loading = false;
                this.otpSend = false;
                this.timer.start();
            }
            catch (error) {
                this.loading = false
                if (error.response) {
                    if (error.response.status === 422) {
                        this.error = error.response.data.message
                    }
                }
                console.error(error.response.data.message)
            }
        },
        async processOtpVerification(url) {
            this.loading = true
            this.error = ''
           try {
               const res = await  axios.post(
                   url,
                   {
                       'otp': this.otpCode,
                       'otp_token': this.otpToken
                   }
               )
               document.location.href = res.data.url
           }
           catch (error) {

               this.loading = false
               if (error.response) {
                   if (error.response.status === 422) {
                       this.error = error.response.data.message
                   }
               }
               console.error()
           }
        },

        reSendOtp() {
            this.processCredential(this.url)
        }


    }
}
