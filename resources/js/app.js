import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

let darkMode = document.getElementById('dark-mode');
let app = document.getElementById('app');

darkMode.addEventListener('change', function(){
    app.classList.toggle('dark-mode');
})
