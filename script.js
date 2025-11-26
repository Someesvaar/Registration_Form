$(document).ready(function () {
    // Fade in effect
    $(".container").hide().fadeIn(600);

    $("#regForm").on("submit", function (e) {
        let errors = [];

        const name = $("#name").val().trim();
        const email = $("#email").val().trim();
        const password = $("#password").val().trim();
        const gender = $("input[name='gender']:checked").val();
        const dob = $("#dob").val().trim();
        const phone = $("#phone").val().trim();
        const course = $("#course").val();

        if (name === "") errors.push("Name is required");
        if (email === "") errors.push("Email is required");
        if (password.length < 6) errors.push("Password must be at least 6 characters");
        if (!gender) errors.push("Please select gender");
        if (dob === "") errors.push("Date of Birth is required");
        if (!/^\d{10}$/.test(phone)) errors.push("Phone must be 10 digits");
        if (course === "") errors.push("Please select a course");

        if (errors.length > 0) {
            e.preventDefault();
            $("#errorBox").html(errors.join("<br>"));
            $("#errorBox").hide().fadeIn(200);
        } else {
            $("#errorBox").html("");
        }
    });
});
