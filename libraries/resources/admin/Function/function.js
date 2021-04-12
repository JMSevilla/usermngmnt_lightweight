$('#onadd').click(function() { 
    var addobj = {
        fname : addfname.value,
        lname : addlname.value,
        uname : adduname.value,
        pass : addpass.value,
        addTrigger: true
    }
    if(addstate.modifier === true) { 
        updatedata();
    }
    else { 
        addvalidate(addobj);
    }
})

function updatedata() {
    $.post(addstate.app + addstate.helpers + "/admin_adduser.php",
    updateState={
        fname: addfname.value,
        lname: addlname.value,
        uname: adduname.value,
        pass: addpass.value,
        id: addstate.updateID,
        updateTrigger: true
    }, (response) => {
        var jsondestroy = JSON.parse(response);
        if(jsondestroy.statusCode === 200) { 
            Swal.fire(
                '',
                'Successfully Updated',
                'success'
            );
            setTimeout(() => {
                window.location.href ="http://localhost/lightweight_usrmngmnt/admincontent/admin_adduser.php";
            }, 2000)
        }
    })
}

function addvalidate(addobj) { 
    if(!addobj.fname || !addobj.lname || !addobj.uname || !addobj.pass) { 
        Swal.fire(
            '',
            'Empty fields',
            'error'
          );
          return false;
    }
    else { 
        addrequest(addobj)
    }
}

function addrequest(addobj) { 
    $.post(addstate.app + addstate.helpers + "/admin_adduser.php", addobj, function(response) { 
        
        var jsondestroy = JSON.parse(response);
        if(jsondestroy.statusCode === 200) { 
            Swal.fire(
                '',
                'Successfully Added',
                'success'
            );
            setTimeout(() => {
                window.location.href ="http://localhost/lightweight_usrmngmnt/admincontent/admin_adduser.php";
            }, 2000)
        }
    })
}

function onactivate(id) { 
    $.post(addstate.app + addstate.helpers + "/admin_adduser.php", activateState = { actTrigger: true, id: id}, (response) => {
        var jsondestroy = JSON.parse(response);
        if(jsondestroy.statusCode === 200) { 
            Swal.fire(
                '',
                'Successfully Activated',
                'success'
            );
            setTimeout(() => {
                window.location.href ="http://localhost/lightweight_usrmngmnt/admincontent/admin_adduser.php";
            }, 2000)
        }
    })
}

function ondeactivate(id) { 
    var ask = confirm("Are you sure you want to deactivate this account ? ");
    if(ask === true) { 
        mainfunct_deactivate(id);
    }
    else { 
        Swal.fire(
            '',
            'No action',
            'info'
        );
    }
}

function mainfunct_deactivate(id) { 
    $.post(addstate.app + addstate.helpers + "/admin_adduser.php", deactivateState = {deactTrigger : true, id: id}, (response) => {
        var jsondestroy = JSON.parse(response);
        if(jsondestroy.statusCode === 200) { 
            Swal.fire(
                '',
                'Successfully Deactivated',
                'success'
            );
            setTimeout(() => {
                window.location.href ="http://localhost/lightweight_usrmngmnt/admincontent/admin_adduser.php";
            }, 2000)
        }
    })
}



function onremove(id) { 
    var ask = confirm("Are you sure you want to remove this account ? ");
    if(ask === true) { 
        mainremoverequest(id);
    }
    else { 
        Swal.fire(
            '',
            'No action',
            'info'
        );
    }
}

function mainremoverequest(id) { 
    $.post(addstate.app + addstate.helpers + "/admin_adduser.php", removeState = {removeTrigger: true, id: id}, (response) => {
        var jsondestroy = JSON.parse(response);
        if(jsondestroy.statusCode === 200) { 
            Swal.fire(
                '',
                'Successfully Removed',
                'success'
            );
            setTimeout(() => {
                window.location.href ="http://localhost/lightweight_usrmngmnt/admincontent/admin_adduser.php";
            }, 2000)
        }
    })
}

function onmodify(id) { 
    $.post(addstate.app + addstate.helpers + "/admin_adduser.php", modifyState={modifyTrigger: true, id:id}, (response) => {
        var jsondestroy = JSON.parse(response);
        addstate.modifier = true;
        addstate.updateID = id;
        addpass.disabled = true;
        if(addstate.modifier === true) { 
            resetbtn.style.display = "block";
            addbtn.innerHTML = "UPDATE";
            addfname.value = jsondestroy.fname;
            addlname.value = jsondestroy.lname;
            adduname.value = jsondestroy.uname;
        }
    })
}

$('#onreset').click(function(){
    addstate.modifier = false;
    addstate.updateID = 0;
    addpass.disabled = false;
    resetbtn.style.display = "none";
            addbtn.innerHTML = "Add";
            addfname.value = null;
            addlname.value = null;
            adduname.value = null;
})