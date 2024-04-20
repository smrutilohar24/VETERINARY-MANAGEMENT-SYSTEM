document.addEventListener("DOMContentLoaded", function() {
    const serviceSections = document.querySelectorAll('.service-category');

    serviceSections.forEach((section, index) => {
        setTimeout(() => {
            section.classList.add('active');
        }, index * 300); // Adjust the delay as needed
    });
});
