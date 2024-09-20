document.addEventListener("DOMContentLoaded", function () {
    // Multi-select functionality for the courses
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

    // Toggle password visibility for both login and signup forms
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

// Helper function for validating email format
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Function to handle signup form validation and submission
function handleSignupSubmit(event) {
    event.preventDefault(); // Prevent the form from submitting immediately

    const firstName = document.getElementById("firstName").value.trim();
    const lastName = document.getElementById("lastName").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
    const selectedCourses = document.getElementById("selectedCourses").value;

    // Validation checks
    if (!firstName || !lastName) {
        alert("Please enter both first name and last name.");
        return;
    }

    if (!validateEmail(email)) {
        alert("Please enter a valid email address.");
        return;
    }

    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return;
    }

    if (selectedCourses === "") {
        alert("Please select at least one course.");
        return;
    }

    // If validation passes, send the form data via fetch API
    fetch("/signupPost", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector("input[name=_token]").value, // for CSRF protection in Laravel
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
}

// Function to handle login form validation and submission
function handleLoginSubmit(event) {
    event.preventDefault(); // Prevent the form from submitting immediately

    const email = document.getElementById("login_email").value.trim();
    const password = document.getElementById("login_password").value.trim();

    // Validation checks
    if (!validateEmail(email)) {
        alert("Please enter a valid email address.");
        return;
    }

    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return;
    }

    // If validation passes, submit the form via fetch or redirect
    fetch("/loginPost", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector("input[name=_token]").value, // for CSRF protection in Laravel
        },
        body: JSON.stringify({
            email: email,
            password: password,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                // Redirect to home page or dashboard after login
                window.location.href = "/index.php";
            } else {
                alert("Login failed. Please try again.");
            }
        })
        .catch((error) => {
            console.error("Error during login:", error);
        });
}