function validate(){
    var password = document.getElementById("password").value;
    var confirm = document.getElementById("confirmPassword").value;

    if(!(password == confirm)){
        document.getElementById("errorMessage").innerHTML = "Password do not match!";
        return false;        
    }
    else {
        return true;
    }
}