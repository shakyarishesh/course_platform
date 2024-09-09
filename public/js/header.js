// js/header.js

document.addEventListener('DOMContentLoaded', function() {
    const searchIcon = document.querySelector('.search-icon');
    const searchBar = document.querySelector('.search-bar');

    searchIcon.addEventListener('click', function(e) {
        e.preventDefault();
        searchBar.classList.toggle('active');
    });
});