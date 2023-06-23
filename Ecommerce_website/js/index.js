// for register
function passmatch() {
    passObj = document.getElementById("pass");
    passconfirmObj = document.getElementById("passconfirm");
    if (passObj.value === passconfirmObj.value) {
        indicator = document.getElementById("passcheckindicator");
        indicator.style.color = "green";
        indicator.innerHTML = "Password match";
        return true;
    }
    else {
        indicator = document.getElementById("passcheckindicator");
        indicator.style.color = "red";
        indicator.innerHTML = "Password doesn't match !!!";
        return false;
    }
}