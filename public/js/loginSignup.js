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
    // Function to handle signup form submission
    function handleSignupSubmit(event) {
        event.preventDefault(); // Prevent the form from submitting immediately

        const firstName = document.getElementById("firstName").value.trim();
        const lastName = document.getElementById("lastName").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();
        const selectedCourses =
            document.getElementById("selectedCourses").value;

        // Simple validation checks
        if (firstName && lastName && email && password.length >= 8) {
            // If validation passes, send the form data via fetch API (or form.submit() if the server handles redirection)
            fetch("/signupPost", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN":
                        document.querySelector("input[name=_token]").value, // for CSRF protection in Laravel
                },
                body: JSON.stringify({
                    first_name: firstName,
                    last_name: lastName,
                    email: email,
                    password: password,
                    selectedCourses: selectedCourses,
                }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        // Redirect to login page on successful signup
                        window.location.href = "/login";
                    } else {
                        alert("Signup failed. Please try again.");
                    }
                })
                .catch((error) => {
                    console.error("Error during signup:", error);
                });
        } else {
            alert(
                "Please fill in all fields correctly. Password must be at least 8 characters."
            );
        }
    }

    // Toggle password visibility
    document.querySelectorAll(".toggle-password").forEach((item) => {
        item.addEventListener("click", function () {
            const targetInput = document.getElementById(
                this.getAttribute("data-target")
            );
            const icon = this.querySelector("i");

            if (targetInput.type === "password") {
                targetInput.type = "text";
                icon.textContent = "visibility"; // Switch to 'eye open' icon
            } else {
                targetInput.type = "password";
                icon.textContent = "visibility_off"; // Switch to 'eye closed' icon
            }
        });
    });
});
