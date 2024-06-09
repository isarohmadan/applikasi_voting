function updateCountdown() {
    const deadlines = document.querySelectorAll('[id^="deadline-"]');
    
    deadlines.forEach((deadlineElement) => {
        const deadline = new Date(deadlineElement.getAttribute('data-deadline'));
        console.log(deadline);
        const now = new Date().getTime();
        const distance = deadline - now;

        if (distance < 0) {
            deadlineElement.innerHTML = "EXPIRED";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        deadlineElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
    });
}

setInterval(updateCountdown, 1000);
window.onload = updateCountdown;