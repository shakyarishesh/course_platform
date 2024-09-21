document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.course-card');

    // Function to create star rating
    // function createStarRating(rating, maxRating = 5) {
    //     const ratingContainer = document.createElement('div');
    //     ratingContainer.classList.add('star-rating');
        
    //     for (let i = 1; i <= maxRating; i++) {
    //         const star = document.createElement('i');
    //         star.classList.add('material-icons');
    //         star.textContent = i <= rating ? 'star' : 'star_border';
    //         star.style.color = i <= rating ? '#FFD700' : '#ccc'; // Yellow for filled stars
    //         ratingContainer.appendChild(star);
    //     }

    //     return ratingContainer;
    // }

    cards.forEach(card => {
        const ratingValue = card.getAttribute('data-rating');
        const ratingElement = createStarRating(parseFloat(ratingValue));
        const ratingContainer = card.querySelector('.course-info .rating');
        ratingContainer.innerHTML = ''; // Clear existing rating content
        ratingContainer.appendChild(ratingElement);

        card.addEventListener('mouseenter', () => {
            card.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease, color 0.3s ease';
            card.style.transform = 'translateY(-10px)';
            card.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.3)';
            card.style.backgroundColor = '#E1E1E1';
            card.style.color = '#333333';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease, color 0.3s ease';
            card.style.transform = 'translateY(0)';
            card.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.1)';
            card.style.backgroundColor = '#FFFFFF';
            card.style.color = '#333333';
        });
    });
});