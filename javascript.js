function showPassword() {
    var password = document.getElementById("password");
    var eye_icon = document.getElementById("eye_icon");
    eye_icon.name = 'eye-outline';
    console.log(password.getAttribute('type'));


    if (password.getAttribute('type') === 'password'){
        password.setAttribute('type', 'text')
        eye_icon.name = 'eye-outline';
    } else {
        password.setAttribute('type', "password");
        eye_icon.name = 'eye-off-outline'
    }
}