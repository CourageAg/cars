// Filter cars by price range
document.addEventListener('DOMContentLoaded', () => {
    const filterButton = document.querySelector('.filter-button');
    const carCards = document.querySelectorAll('.car-card');

    filterButton.addEventListener('click', () => {
        const minPrice = parseFloat(document.querySelector('#min-price').value);
        const maxPrice = parseFloat(document.querySelector('#max-price').value);

        carCards.forEach(card => {
            const price = parseFloat(card.querySelector('.price').textContent.replace('$', ''));
            if (price >= minPrice && price <= maxPrice) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelector('.slides');
    const slide = document.querySelectorAll('.slide');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    let currentIndex = 0;

    function showSlide(index) {
        if (index >= slide.length) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = slide.length - 1;
        } else {
            currentIndex = index;
        }
        slides.style.transform = 'translateX(' + (-currentIndex * 100) + '%)';
    }

    prev.addEventListener('click', () => {
        showSlide(currentIndex - 1);
    });

    next.addEventListener('click', () => {
        showSlide(currentIndex + 1);
    });

    setInterval(() => {
        showSlide(currentIndex + 1);
    }, 3000);
});

