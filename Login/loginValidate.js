function validateLoginForm(pform) {
    const email = pform.email.value;
    const password = pform.password.value;
    let flag = true;
    const emailErr = document.getElementById('emailErr');
    const passErr = document.getElementById('passwordErr');
    emailErr.innerHTML = "";
    passErr.innerHTML = "";

    if (email === "") {
        emailErr.innerHTML = 'Please enter a email.';
        emailErr.style.color = "red";
        flag = false;
    }

    if (password === "") {
        passErr.innerHTML = 'Please enter a password.';
        passErr.style.color = "red";
        flag = false;
    }
    return flag;
}
