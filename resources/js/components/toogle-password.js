const toogle_password = document.querySelectorAll(".toogle-password");

const tooglePassword = () => {
    toogle_password.forEach((element) => {
        element.addEventListener("click", () => {
            const parent = element.parentElement;
            const password = parent.querySelector("input");
            const icon = parent.querySelector("i");

            if (password.type === "password") {
                password.type = "text";
                icon.classList.add("ri-eye-line");
                icon.classList.remove("ri-eye-off-line");
            } else {
                password.type = "password";
                icon.classList.remove("ri-eye-line");
                icon.classList.add("ri-eye-off-line");
            }
        });
    });
};

if (toogle_password) {
    tooglePassword();
}
