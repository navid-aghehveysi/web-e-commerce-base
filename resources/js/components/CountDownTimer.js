export default function CountDownTimer(initialMinute = 5) {
    return {
        minute: initialMinute,
        second: 59,
        counter: null,
        startTime:'',
        endTime:'',
        start() {
            this.reset();
            this.startTime = true;
            this.endTime = false;
            this.counter = setInterval(() => {
                if (this.second === 0) {
                    if (this.minute === 0) {
                        this.stop();
                        this.startTime = false;
                        this.endTime = true;
                        return;
                    }
                    this.minute--;
                    this.second = 59;
                }else {
                    this.second--;
                }
            } , 1000)

        },
        reset() {
            this.minute = initialMinute;
            this.second = 59;
        },
        stop() {
            clearInterval(this.counter)
        },

        get timeFormatted() {
            const m = String(this.minute).padStart(2, '0')
            const s = String(this.second).padStart(2, '0')
            return `${m}:${s}`
        }

    }
}
