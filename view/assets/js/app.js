document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".post-card");
    window.addEventListener("scroll", function () {
        cards.forEach(card => {
            if (isScrolledIntoView(card)) card.classList.add("fade-in");
        })
    });
    function isScrolledIntoView(element) {
        const rect = element.getBoundingClientRect();
        return rect.top < window.innerHeight && rect.bottom >= 0;
    }
});