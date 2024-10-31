document.addEventListener('DOMContentLoaded', function () {
    // Handle adding courses
    document.getElementById('add-course-form').addEventListener('submit', function (event) {
        event.preventDefault();
        const courseName = document.getElementById('course-name').value;

        // Normally, here you would send the data to the server
        console.log(`Adding course: ${courseName}`);
        
        // For now, just clear the input and alert
        alert(`Course "${courseName}" added!`);
        document.getElementById('course-name').value = '';
    });

    // Handle adding users
    document.getElementById('add-user-form').addEventListener('submit', function (event) {
        event.preventDefault();
        const userName = document.getElementById('user-name').value;
        const userEmail = document.getElementById('user-email').value;

        // Normally, here you would send the data to the server
        console.log(`Adding user: ${userName}, Email: ${userEmail}`);
        
        // For now, just clear the inputs and alert
        alert(`User "${userName}" added!`);
        document.getElementById('user-name').value = '';
        document.getElementById('user-email').value = '';
    });
});