$('#onregister').click(function() { 
    var obj = { 
        fname : firstname.value,
        lname: lastname.value,
        uname: username.value,
        pass: password.value,
        cpass: confirmpass.value,
        trigger: true
    }
    validate(obj);
})

function validate(obj) {
    if(!obj.fname || !obj.lname || !obj.uname ||!obj.pass ||!obj.cpass){
        alert("Empty fields");
        return false;
    }else if(obj.pass != obj.cpass){
        alert("Password mismatch");
        return false;
    }
    else { 
        request_registration(obj);
    }
}

function request_registration(obj) {
    $.post(state.app + state.helpers + "/registerH.php", obj, function(response) { 
        console.log(response);
            var jsondestry = JSON.parse(response);
            if(jsondestry.statusCode === 201) { 
                alert("Username already exist");
                return false;
            }
            else if(jsondestry.statusCode === 200){
                alert("Successfully Register");

            }
    })
}

$('#onsignin').click(function() {
    var signobj = { 
        sign1: signinusername.value,
        sign2: signinpassword.value,
        signtrigger : true
    }
    validate_signin(signobj)
})

function validate_signin(signobj){ 
    if(!signobj.sign1 || !signobj.sign2){
        alert("empty fields");
        return false;
    }
    else { 
        request_signin(signobj);
    }
}

function request_signin(signobj) {
    $.post(state.app + state.helpers + "/registerH.php",signobj, function(response) { 
       var jsondestroy = JSON.parse(response);
       if(jsondestroy.statusCode === 200) { 
           alert("Successfully Sign in");
           window.location.href = "http://localhost/lightweight_usrmngmnt/admincontent/admin_dashboard.php";
       }
       else if(jsondestroy.statusCode === "user") { 
        alert("Successfully Sign in");
        window.location.href = "http://localhost/lightweight_usrmngmnt/usercontent/user.content.php";
       }
       else if(jsondestroy.statusCode === 201) { 
        alert("Disabled Account");
        return false;
       }
       else if(jsondestroy.statusCode === 202) { 
        alert("Invalid password");
        return false;
       }
       else if(jsondestroy.statusCode === 203) { 
        alert("Username not found");
        return false;
       }
       
    })
}

