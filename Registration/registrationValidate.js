function validateRegistrationForm(form){
    const fileName = form.image.value;
    const firstname = form.firstname.value;
    const lastname = form.lastname.value;
    const fathername = form.fathername.value;
    const mothername = form.mothername.value;
    const d_birth = form.d_birth.value;
    const gender = form.gender.value;
    const bloodgroup = form.bloodgroup.value;
    const religion = form.religion.value;
    const email = form.email.value;
    const phone = form.Phone.value;
    const country = form.country.value;
    const division = form.Division.value;
    const rsc = form.rsc.value;
    const postcode = form.postcode.value;
    const ssc = form.ssc.value;
    const sscDepartment = form.sscDepartment.value;
    const sscInstitution = form.sscInstitution.value;
    const sscCgpa = form.sscCgpa.value;
    const sscBoard = form.sscBoard.value;
    const hsc = form.hsc.value;
    const hscDepartment = form.hscDepartment.value;
    const hscInstitution = form.hscInstitution.value;
    const hscCgpa = form.hscCgpa.value;
    const hscBoard = form.hscBoard.value;
    const username = form.username.value;
    const password = form.password.value;
    const confirm_password = form.confirm_password.value;
    let flag = true;
    
    // const allFields = {
    //     firstname,
    //     lastname,
    //     fathername,
    //     mothername,
    //     d_birth,
    //     gender,
    //     bloodgroup,
    //     religion,
    //     email,
    //     phone,
    //     country,
    //     division,
    //     rsc,
    //     postcode,
    //     ssc,
    //     sscDepartment,
    //     sscInstitution,
    //     sscCgpa,
    //     sscBoard,
    //     hsc,
    //     hscDepartment,
    //     hscInstitution,
    //     hscCgpa,
    //     hscBoard,
    //     username,
    //     password,
    //     confirm_password
    // };
    
    // console.log(allFields);

    
    
           

            // Check if a file is selected
           


const imageErr = document.getElementById('imageErr');
const firstnameErr = document.getElementById('firstnameErr');
const lastnameErr = document.getElementById('lastnameErr');
const fathernameErr = document.getElementById('fathernameErr');
const mothernameErr = document.getElementById('mothernameErr');
const d_birthErr = document.getElementById('d_birthErr');
const genderErr = document.getElementById('genderErr');
const bloodgroupErr = document.getElementById('bloodgroupErr');
const religionErr = document.getElementById('religionErr');
const emailErr = document.getElementById('emailErr');
const phoneErr = document.getElementById('phoneErr');
const countryErr = document.getElementById('countryErr');
const divisionErr = document.getElementById('divisionErr');
const rscErr = document.getElementById('rscErr');
const postcodeErr = document.getElementById('postcodeErr');
const sscErr = document.getElementById('sscErr');
const sscDepartmentErr = document.getElementById('sscDepartmentErr');
const sscInstitutionErr = document.getElementById('sscInstitutionErr');
const sscCgpaErr = document.getElementById('sscCgpaErr');
const sscBoardErr = document.getElementById('sscBoardErr');
const hscErr = document.getElementById('hscErr');
const hscDepartmentErr = document.getElementById('hscDepartmentErr');
const hscInstitutionErr = document.getElementById('hscInstitutionErr');
const hscCgpaErr = document.getElementById('hscCgpaErr');
const hscBoardErr = document.getElementById('hscBoardErr');
const usernameErr = document.getElementById('usernameErr');
const passErr = document.getElementById('passwordErr');
const confirm_passwordErr = document.getElementById('confirm_passwordErr');

imageErr.innerHTML="";
emailErr.innerHTML = "";
passErr.innerHTML = "";
firstnameErr.innerHTML = "";
lastnameErr.innerHTML = "";
fathernameErr.innerHTML = "";
mothernameErr.innerHTML = "";
d_birthErr.innerHTML = "";
genderErr.innerHTML = "";
bloodgroupErr.innerHTML = "";
religionErr.innerHTML = "";
phoneErr.innerHTML = "";
countryErr.innerHTML = "";
divisionErr.innerHTML = "";
rscErr.innerHTML = "";
postcodeErr.innerHTML = "";
sscErr.innerHTML = "";
sscDepartmentErr.innerHTML = "";
sscInstitutionErr.innerHTML = "";
sscCgpaErr.innerHTML = "";
sscBoardErr.innerHTML = "";
hscErr.innerHTML = "";
hscDepartmentErr.innerHTML = "";
hscInstitutionErr.innerHTML = "";
hscCgpaErr.innerHTML = "";
hscBoardErr.innerHTML = "";
usernameErr.innerHTML = "";
passErr.innerHTML = "";
confirm_passwordErr.innerHTML = "";


if (!fileName) {
    imageErr.innerHTML='Upload your image!';
    imageErr.style.color="red";
    flag= false;
}

if (firstname === "") {
    firstnameErr.innerHTML = 'Please enter your first name.';
    firstnameErr.style.color = "red";
    flag = false;
}

// Validation for lastname
if (lastname === "") {
    lastnameErr.innerHTML = 'Please enter your last name.';
    lastnameErr.style.color = "red";
    flag = false;
}

// Validation for fathername
if (fathername === "") {
    fathernameErr.innerHTML = 'Please enter your father\'s name.';
    fathernameErr.style.color = "red";
    flag = false;
}

// Validation for mothername
if (mothername === "") {
    mothernameErr.innerHTML = 'Please enter your mother\'s name.';
    mothernameErr.style.color = "red";
    flag = false;
}

if (d_birth === "") {
    d_birthErr.innerHTML = 'Please enter your date of birth.';
    d_birthErr.style.color = "red";
    flag = false;
}
if (!gender) {
    genderErr.innerHTML = 'Please select a gender.';
    genderErr.style.color = "red";
    flag = false;
}
if (bloodgroup === "") {
    bloodgroupErr.innerHTML = 'Please select your blood group.';
    bloodgroupErr.style.color = "red";
    flag = false;
}
if (religion === "") {
    religionErr.innerHTML = 'Please select your religion.';
    religionErr.style.color = "red";
    flag = false;
}

if (email === "") {
    emailErr.innerHTML = 'Please enter an email.';
    emailErr.style.color = "red";
    flag = false;
}

// Validation for phone
if (phone === "") {
    phoneErr.innerHTML = 'Please enter your phone/mobile number.';
    phoneErr.style.color = "red";
    flag = false;
}

if (country === "") {
    countryErr.innerHTML = 'Please select your country.';
    countryErr.style.color = "red";
    flag = false;
}

// Validation for division
if (division === "") {
    divisionErr.innerHTML = 'Please select your division.';
    divisionErr.style.color = "red";
    flag = false;
}

if (rsc === "") {
    rscErr.innerHTML = 'Please enter your road/street/city.';
    rscErr.style.color = "red";
    flag = false;
}

// Validation for postcode
if (postcode === "") {
    postcodeErr.innerHTML = 'Please enter your postcode.';
    postcodeErr.style.color = "red";
    flag = false;
}
if (ssc === "") {
    sscErr.innerHTML = 'Please enter your SSC passing year.';
    sscErr.style.color = "red";
    flag = false;
}

// Validation for sscDepartment
if (sscDepartment === "") {
    sscDepartmentErr.innerHTML = 'Please select your SSC department.';
    sscDepartmentErr.style.color = "red";
    flag = false;
}

// Validation for sscInstitution
if (sscInstitution === "") {
    sscInstitutionErr.innerHTML = 'Please enter your SSC institution name.';
    sscInstitutionErr.style.color = "red";
    flag = false;
}

// Validation for sscCgpa
if (sscCgpa === "") {
    sscCgpaErr.innerHTML = 'Please enter your SSC CGPA.';
    sscCgpaErr.style.color = "red";
    flag = false;
}

// Validation for sscBoard
if (sscBoard === "") {
    sscBoardErr.innerHTML = 'Please select your SSC board.';
    sscBoardErr.style.color = "red";
    flag = false;
}

// Validation for hsc
if (hsc === "") {
    hscErr.innerHTML = 'Please enter your HSC passing year.';
    hscErr.style.color = "red";
    flag = false;
}

// Validation for hscDepartment
if (hscDepartment === "") {
    hscDepartmentErr.innerHTML = 'Please select your HSC department.';
    hscDepartmentErr.style.color = "red";
    flag = false;
}

// Validation for hscInstitution
if (hscInstitution === "") {
    hscInstitutionErr.innerHTML = 'Please enter your HSC institution name.';
    hscInstitutionErr.style.color = "red";
    flag = false;
}

// Validation for hscCgpa
if (hscCgpa === "") {
    hscCgpaErr.innerHTML = 'Please enter your HSC CGPA.';
    hscCgpaErr.style.color = "red";
    flag = false;
}

// Validation for hscBoard
if (hscBoard === "") {
    hscBoardErr.innerHTML = 'Please select your HSC board.';
    hscBoardErr.style.color = "red";
    flag = false;
}

if (username === "") {
    usernameErr.innerHTML = 'Please enter a username.';
    usernameErr.style.color = "red";
    flag = false;
}

// Validation for password
if (password === "") {
    passErr.innerHTML = 'Please enter a password.';
    passErr.style.color = "red";
    flag = false;
}

// Validation for confirm_password
if (confirm_password === "") {
    confirm_passwordErr.innerHTML = 'Please confirm your password.';
    confirm_passwordErr.style.color = "red";
    flag = false;
}

return flag;  

}