function displayPassword(field, btn) {
    btn.addEventListener("click", () => {
        if (field.type === "password") {
            field.type = "text";
            btn.innerHTML = `<i class="bi bi-eye-fill"></i>`;
        } else {
            field.type = "password";
            btn.innerHTML = `<i class="bi bi-eye-slash-fill"></i>`;
        }
    });
}

let password = document.getElementById("password");
let passwordButton = document.getElementById("show-password");
let passwordConfirmation = document.getElementById("password-confirmation");
let passwordConfirmationButton = document.getElementById(
    "show-password-confirmation",
);

displayPassword(password, passwordButton);
displayPassword(passwordConfirmation, passwordConfirmationButton);
