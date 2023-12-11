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


    return flag;

}