import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()



    // Optional: Add any additional interactivity or performance optimizations
    document.addEventListener('DOMContentLoaded', () => {
        const marqueeContents = document.querySelectorAll('.marquee-content');
        
        marqueeContents.forEach(content => {
            content.addEventListener('mouseenter', () => {
                content.style.animationPlayState = 'paused';
            });
            
            content.addEventListener('mouseleave', () => {
                content.style.animationPlayState = 'running';
            });
        });
    });

