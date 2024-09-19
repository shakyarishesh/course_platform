// Multi-select functionality for the courses
document.addEventListener("DOMContentLoaded", function () {
    const courseButtons = document.querySelectorAll(".course-option");
    const selectedCoursesInput = document.getElementById("selectedCourses");

    courseButtons.forEach((button) => {
        button.addEventListener("click", function () {
            if (button.classList.contains("selected")) {
                button.classList.remove("selected");
            } else {
                button.classList.add("selected");
            }
            updateSelectedCourses();
        });
    });

    function updateSelectedCourses() {
        const selectedCourses = [];
        courseButtons.forEach((button) => {
            if (button.classList.contains("selected")) {
                selectedCourses.push(button.getAttribute("data-value"));
            }
        });
        selectedCoursesInput.value = selectedCourses.join(", ");
    }
});

// Function to toggle password visibility
document.querySelectorAll(".toggle-password").forEach((item) => {
    item.addEventListener("click", function () {
        // Get the target input field using the data-target attribute
        const targetInput = document.getElementById(
            this.getAttribute("data-target")
        );
        const icon = this.querySelector("i");

        // Toggle the input type between password and text
        if (targetInput.type === "password") {
            targetInput.type = "text";
            icon.textContent = "visibility"; // Switch to 'eye open' icon
        } else {
            targetInput.type = "password";
            icon.textContent = "visibility_off"; // Switch to 'eye closed' icon
        }
    });
    // Function to handle signup form submission
    function handleSignupSubmit(event) {
        // Prevent form from submitting immediately
        event.preventDefault();
    
        const form = document.getElementById("signupForm");
    
        // Get form fields for validation
        const firstName = document.getElementById("firstName").value.trim();
        const lastName = document.getElementById("lastName").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();
    
        // Simple validation checks
        if (firstName && lastName && email && password.length >= 8) {
            // All fields are valid, proceed to submit the form
            form.submit();
        } else {
            // If validation fails, show an alert and prevent submission
            alert("Please fill in all fields correctly. Password must be 8+ characters.");
        }
    }
    
});
