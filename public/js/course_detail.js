// Tab functionality
const tabButtons = document.querySelectorAll('.tab'); // Select all tab buttons
const tabItems = document.querySelectorAll('.tab-content'); // Select all tab content sections

tabButtons.forEach(button => {
    button.addEventListener('click', () => {
        // Remove 'active' class from all buttons and content sections
        tabButtons.forEach(btn => btn.classList.remove('active'));
        tabItems.forEach(item => item.classList.remove('active'));

        // Add 'active' class to the clicked button
        button.classList.add('active');

        // Get the tab content to show
        const tabId = button.getAttribute('data-tab');

        // Show the corresponding tab content
        const activeTab = document.getElementById(tabId);
        if (activeTab) {
            activeTab.classList.add('active');
        }
    });
});



    const container = document.querySelector('.related-courses-container');

    function scrollLeft() {
        container.scrollBy({
            left: -250, // Adjust based on card size
            behavior: 'smooth'
        });
    }

    function scrollRight() {
        container.scrollBy({
            left: 250, // Adjust based on card size
            behavior: 'smooth'
        });
    }

