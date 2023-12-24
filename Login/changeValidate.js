function changeValidateForm(pform){
    const prevPass=pform.previous.value;
    const password = pform.password.value;
    const confirm_password=pform.confirm_password.value;
    let flag = true;
    const prevErr=document.getElementById('prevPassErr');
    const passErr = document.getElementById('passwordErr');
    const confirm_Err=document.getElementById('confirm_Err');

    prevErr.innerHTML="";
    passErr.innerHTML="";
    confirm_Err.innerHTML="";

    if (prevPass === "") {
        prevErr.innerHTML = 'Please enter previous password.';
        prevErr.style.color = "red";
        flag = false;
    }
    if (password === "") {
        passErr.innerHTML = 'Please enter a password.';
        passErr.style.color = "red";
        flag = false;
    }
    if(confirm_password===""){
        confirm_Err.innerHTML="confirm your password";
        confirm_Err.style.color="red";
        flag=false;
    }

    if(flag) {
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', 'changePassAction.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        let std = {
            'prevPass':prevPass,
            'password': password 
        }
        let data = JSON.stringify(std);
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    if (this.responseText === "Success") {
                        // let txt = document.getElementById('msg');
                        // txt.innerHTML = "Password Changed Successfully";
                        // txt.style.color = "green";
                        // location.reload();
                        document.getElementById('msg').innerHTML = "Password Changed Successfully";
                        return true;
                    } else {
                        document.getElementById('msg').innerHTML = "Error to change password";
                    }
                } else {
                    alert("Error: " + this.status);
                }
            }
        };
        xhttp.send('std=' + data);
        return false;
    }

    return flag;

}