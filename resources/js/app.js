import './bootstrap';
import Alpine from 'alpinejs';
import htmx from 'htmx.org';
import confetti from 'canvas-confetti';


window.confetti = confetti; // Make it globally available
window.Alpine = Alpine;
window.htmx = htmx;

Alpine.start();

