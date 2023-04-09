function confirmDelete() {
    return confirm('Are you sure you want to delete this?');
}
//function to compare betweeen two passwords
function comparePasswords() {
    const pw1 = document.getElementById('password').value;
    const pw2 = document.getElementById('confirm').value;
    const pwMsg = document.getElementById('pwMsg');

    if (pw1 != pw2) {
        pwMsg.innerText = 'Passwords do not match';
        return false; // this prevents the form submission
    }
    else {
        pwMsg.innerText = '';
        return true;
    }
}
//function to show password
function showPassword(){
    const password = document.querySelector("#password");
    const confirm = document.querySelector("#confirm");
    const showPass = document.querySelector("#showPass");
    //for login page and register page
    if(password.type == "password"){
        password.type = "visible";
        //if confirm exist
        if(confirm){
        confirm.type = "visible";
        }
        showPass.value = "Hide Password";
    }
    else{
        password.type ="password";
        //if confirm exist
        if(confirm){
        confirm.type ="password";
        }
        showPass.value = "Show Password";
    }
}
