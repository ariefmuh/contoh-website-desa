function createForm() {
    var email = document.getElementById("inputEmail").value
    var password = document.getElementById("inputPassword").value
    // ----------------------------------------------------------------- //  
    var form = new FormData();
    form.append("username", email)
    form.append("password", password)
    // ----------------------------------------------------------------- //
    return form
}

function login() {
    var form = createForm();
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var response = xhttp.responseText;
        if (response == 'success') {
            window.location.href = '../../Yusran/dashboard/';
        } else {
            document.getElementById("Alert").innerHTML = 'Username atau Password salah';
        }
    }
    xhttp.open("POST", "./api/login.php");
    xhttp.send(form);
}

function showPassword() {
    var x = document.getElementById("inputPassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
}

document.getElementById("showPassword").addEventListener("click", function(){
    showPassword()
    document.getElementById("password_checkbox").checked = !document.getElementById("password_checkbox").checked;
})