function validateForm() {
    var password = document.forms["register_form"]["password"].value;
    var cpassword = document.forms["register_form"]["cpassword"].value;
    if (password != cpassword) {
        alert("Passwords do not match");
        return false;
    }
    if(password.length < 8){
        alert("Password must be at least 8 characters long");
        return false;
    }
    return true;
}