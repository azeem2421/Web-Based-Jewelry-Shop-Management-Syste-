//redirecting customer login button to login page

document.addEventListener("DOMContentLoaded", function () {
    let loginButton = document.getElementById("loginButton");
    if (loginButton) {
        loginButton.addEventListener("click", function() {
            window.location.href ="/account/login";
        });
    }
});
