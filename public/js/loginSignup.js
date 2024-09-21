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

