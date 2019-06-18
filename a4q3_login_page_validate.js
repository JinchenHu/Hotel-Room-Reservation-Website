function validateUserName(){
    var name = document.getElementById('name').value;
    if(name == null || name == ""){
        document.getElementById('nameError').innerHTML = "Please enter a user name";
        return false;
    }else{
        if (/^[a-zA-Z\d]+$/.test(name)) {
            document.getElementById('nameError').innerHTML=""
            return true;
        }
        else{
            document.getElementById('nameError').innerHTML = "Invalid user name format!!!";
            return false;
        }
    }
}

function validatePassword() {
    var psw = document.getElementById("psw").value;
    if(psw == null || psw == ""){
        document.getElementById('pswError').innerHTML = "Please enter your password";
        return false;
    }else{
        if (/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,}$/.test(psw)) {
            document.getElementById('pswError').innerHTML = "";
            return true;
        }
        else{
            document.getElementById('pswError').innerHTML = "Invalid password format!!!";
            return false;
        }
    }
}

function checkInfo() {
    if (validatePassword() && validateUserName()){
        return true;
    } else{
        alert("Please check your input")
        return false;
    }
}

