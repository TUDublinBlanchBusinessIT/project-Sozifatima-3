import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Add fade-in transition to the page
document.addEventListener("DOMContentLoaded", function() {
    // Add the 'loaded' class to body once content is fully loaded
    document.body.classList.add('loaded');
});
