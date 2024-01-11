function showPassword_L() {
    var password = document.getElementById("password_L");
    var eye_icon = document.getElementById("eye_icon_L");

    if (password.getAttribute('type') === 'password'){
        password.setAttribute('type', 'text')
        eye_icon.name = 'eye-outline';
    } else {
        password.setAttribute('type', "password");
        eye_icon.name = 'eye-off-outline'
    }
};

function showPassword_R() {
    var password = document.getElementById("password_R");
    var eye_icon = document.getElementById("eye_icon_R");

    if (password.getAttribute('type') === 'password'){
        password.setAttribute('type', 'text')
        eye_icon.name = 'eye-outline';
    } else {
        password.setAttribute('type', "password");
        eye_icon.name = 'eye-off-outline'
    }
};
