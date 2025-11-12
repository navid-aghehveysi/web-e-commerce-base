import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import axios from 'axios'
import ChangeStatus from "./components/ChangeStatus.js";


// قرار دادن Alpine روی window (برای دسترسی راحت)
window.Alpine = Alpine

// فعال‌سازی پلاگین persist
Alpine.plugin(persist)

// تنظیم axios به صورت global
window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'


// گرفتن CSRF token از meta tag
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.textContent;
} else {
    console.error('CSRF token not found');
}

Alpine.data('changeStatus' , ChangeStatus)

document.addEventListener('alpine:init', () => {

})

// استارت Alpine
Alpine.start()
