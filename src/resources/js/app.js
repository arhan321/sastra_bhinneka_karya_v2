import './bootstrap';
function initScrollReveal() {
    const elements = document.querySelectorAll('[data-reveal]');
    if (!elements.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    });

    elements.forEach(el => observer.observe(el));
}

// Fungsi angka berjalan
window.statsCounter = function (targetValue) {
    return {
        current: 0,
        target: targetValue,
        start() {
            let start = 0;
            const duration = 2000;
            const increment = this.target / (duration / 16);
            const timer = setInterval(() => {
                start += increment;
                if (start >= this.target) {
                    this.current = this.target;
                    clearInterval(timer);
                } else {
                    this.current = Math.floor(start);
                }
            }, 16);
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    initScrollReveal();
});

//ANIMASI ANGKA BERJALAN
window.counter = function (target) {
    return {
        count: 0,
        target: target,
        speed: 200,

        start() {
            let increment = Math.ceil(this.target / this.speed)

            let interval = setInterval(() => {
                this.count += increment

                if (this.count >= this.target) {
                    this.count = this.target
                    clearInterval(interval)
                }
            }, 20)
        }
    }
}
