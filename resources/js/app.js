import './bootstrap';

import Alpine from 'alpinejs';
import 'flowbite';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function (event) {
    document.getElementById('deleteButton').click();
});
