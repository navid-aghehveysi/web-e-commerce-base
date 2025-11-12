import OtpFlow from "../components/OtpFlow.js";

document.addEventListener('alpine:init', () => {
    Alpine.data('otpFlow', OtpFlow);
})
