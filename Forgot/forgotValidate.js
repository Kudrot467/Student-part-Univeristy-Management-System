function validateForgotForm(pform){

    const email = pform.email.value;
    let flag = true;
    const emailErr = document.getElementById('emailErr');
    emailErr.innerHTML = "";
    if (email === "") {
        emailErr.innerHTML = 'Please enter a email.';
        emailErr.style.color = "red";
        flag = false;
    }

    return flag;

}