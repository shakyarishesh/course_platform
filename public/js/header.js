document.addEventListener('DOMContentLoaded', function() {
    // Search Bar Toggle
    const searchIcon = document.querySelector('.search-icon');
    const searchBar = document.querySelector('.search-bar');

    if (searchIcon && searchBar) {
        searchIcon.addEventListener('click', function(e) {
            e.preventDefault();
            searchBar.classList.toggle('active');
        });
    }
});

// Triple-dot (Kebab) menu functionality
document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.querySelector('.menu-icon');
    const menuDropdown = document.querySelector('.menu-dropdown');

    if (menuIcon && menuDropdown) {
        menuIcon.addEventListener('click', function(e) {
            e.preventDefault();
            menuDropdown.style.display = menuDropdown.style.display === 'block' ? 'none' : 'block';
        });

        // Close the dropdown when clicking outside of it
        document.addEventListener('click', function(event) {
            if (!menuIcon.contains(event.target) && !menuDropdown.contains(event.target)) {
                menuDropdown.style.display = 'none';
            }
        });
    }
});