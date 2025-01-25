// function isValidRegisterForm(registerForm) {
//   const firstName = registerForm.frname.value;
//   const lastName = registerForm.lrname.value;
//   const userName = registerForm.rusername.value;
//   const gender = registerForm.rgender.value;
//   const phone = registerForm.rphone.value;
//   const email = registerForm.remail.value;
//   const password = registerForm.rpassword.value;
//   const confirmPassword = registerForm.cpassword.value;

//   const firstNameErrMsg = document.getElementById("firstNameErrMsg");
//   const lastNameErrMsg = document.getElementById("lastNameErrMsg");
//   const userNameErrMsg = document.getElementById("userNameErrMsg");
//   const genderErrMsg = document.getElementById("genderErrMsg");
//   const phoneErrMsg = document.getElementById("phoneErrMsg");
//   const emailErrMsg = document.getElementById("emailErrMsg");
//   const passwordErrMsg = document.getElementById("passwordErrMsg");
//   const confirmPasswordErrMsg = document.getElementById(
//     "confirmPasswordErrMsg"
//   );
//   const registerButton = document.querySelector("button[name='register_btn']");

//   firstNameErrMsg.innerHTML = "";
//   lastNameErrMsg.innerHTML = "";
//   userNameErrMsg.innerHTML = "";
//   genderErrMsg.innerHTML = "";
//   phoneErrMsg.innerHTML = "";
//   emailErrMsg.innerHTML = "";
//   passwordErrMsg.innerHTML = "";
//   confirmPasswordErrMsg.innerHTML = "";

//   let flag = true;

//   if (firstName === "") {
//     firstNameErrMsg.innerHTML = "Fill in the first name";
//     firstNameErrMsg.style.color = "red";
//     flag = false;
//   }

//   if (lastName === "") {
//     lastNameErrMsg.innerHTML = "Fill in the last name";
//     lastNameErrMsg.style.color = "red";
//     flag = false;
//   }

//   if (userName === "") {
//     userNameErrMsg.innerHTML = "Fill in the username";
//     userNameErrMsg.style.color = "red";
//     flag = false;
//   }

//   if (gender === "") {
//     genderErrMsg.innerHTML = "Select a gender";
//     genderErrMsg.style.color = "red";
//     flag = false;
//   }

//   if (phone === "") {
//     phoneErrMsg.innerHTML = "Fill in the phone number";
//     phoneErrMsg.style.color = "red";
//     flag = false;
//   }

//   // You can add more validation for email, password, and confirm password here

//   if (email === "") {
//     emailErrMsg.innerHTML = "Fill in the email address";
//     emailErrMsg.style.color = "red";
//     flag = false;
//   } else if (!isValidEmail(email)) {
//     emailErrMsg.innerHTML = "Invalid email address";
//     emailErrMsg.style.color = "red";
//     flag = false;
//   }

//   if (password === "") {
//     passwordErrMsg.innerHTML = "Fill in the password";
//     passwordErrMsg.style.color = "red";
//     flag = false;
//   } else if (password.length < 6) {
//     passwordErrMsg.innerHTML = "Password must be at least 6 characters long";
//     passwordErrMsg.style.color = "red";
//     flag = false;
//   }

//   if (confirmPassword === "") {
//     confirmPasswordErrMsg.innerHTML = "Fill in the confirm password";
//     confirmPasswordErrMsg.style.color = "red";
//     flag = false;
//   } else if (password !== confirmPassword) {
//     confirmPasswordErrMsg.innerHTML = "Passwords do not match";
//     confirmPasswordErrMsg.style.color = "red";
//     flag = false;
//   }

//   registerButton.disabled = !flag;
//   registerButton.style.backgroundColor = flag ? "blue" : "";

//   return flag;
// }
// function isValidEmail(email) {
//   // Use a regular expression for basic email validation
//   const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//   return emailRegex.test(email);
// }

// register.js

document.addEventListener("DOMContentLoaded", function () {
  const registerForm = document.querySelector(
    "form[action='functions/authcode.php']"
  );

  //   // Disable the register button initially
  const registerButton = document.querySelector("button[name='register_btn']");
  registerButton.disabled = true;

  if (registerForm) {
    registerForm.addEventListener("input", function () {
      // Update button state on any input change in the form
      updateRegisterButtonState(registerForm, registerButton);
    });

    //  registerForm.addEventListener("submit", function (event) {
    //    if (!isValidRegisterForm(registerForm)) {
    //     event.preventDefault(); // Prevent form submission if validation fails
    //    }
    // });
  }
});

function updateRegisterButtonState(registerForm, registerButton) {
  const isValidForm = isValidRegisterForm(registerForm);
  registerButton.disabled = !isValidForm;

  // Set background color to blue when the button is active
  registerButton.style.backgroundColor = isValidForm ? "blue" : "";
}

function isValidRegisterForm(registerForm) {
  const firstName = registerForm.frname.value;
  const lastName = registerForm.lrname.value;
  const userName = registerForm.rusername.value;
  const gender = registerForm.rgender.value;
  const phone = registerForm.rphone.value;
  const email = registerForm.remail.value;
  const password = registerForm.rpassword.value;
  const confirmPassword = registerForm.cpassword.value;

  const firstNameErrMsg = document.getElementById("firstNameErrMsg");
  const lastNameErrMsg = document.getElementById("lastNameErrMsg");
  const userNameErrMsg = document.getElementById("userNameErrMsg");
  const genderErrMsg = document.getElementById("genderErrMsg");
  const phoneErrMsg = document.getElementById("phoneErrMsg");
  const emailErrMsg = document.getElementById("emailErrMsg");
  const passwordErrMsg = document.getElementById("passwordErrMsg");
  const confirmPasswordErrMsg = document.getElementById(
    "confirmPasswordErrMsg"
  );

  firstNameErrMsg.innerHTML = "";
  lastNameErrMsg.innerHTML = "";
  userNameErrMsg.innerHTML = "";
  genderErrMsg.innerHTML = "";
  phoneErrMsg.innerHTML = "";
  emailErrMsg.innerHTML = "";
  passwordErrMsg.innerHTML = "";
  confirmPasswordErrMsg.innerHTML = "";

  let flag = true;

  if (firstName === "") {
    firstNameErrMsg.innerHTML = "Fill in the first name";
    firstNameErrMsg.style.color = "red";
    flag = false;
  }

  if (lastName === "") {
    lastNameErrMsg.innerHTML = "Fill in the last name";
    lastNameErrMsg.style.color = "red";
    flag = false;
  }

  if (userName === "") {
    userNameErrMsg.innerHTML = "Fill in the username";
    userNameErrMsg.style.color = "red";
    flag = false;
  }

  if (gender === "") {
    genderErrMsg.innerHTML = "Select a gender";
    genderErrMsg.style.color = "red";
    flag = false;
  }

  if (phone === "") {
    phoneErrMsg.innerHTML = "Fill in the phone number";
    phoneErrMsg.style.color = "red";
    flag = false;
  } else if (!/^\d{11}$/.test(phone)) {
    phoneErrMsg.innerHTML =
      "Phone number must be exactly 11 digits long and consist of numbers only.";
    phoneErrMsg.style.color = "red";
    flag = false;
  }

  if (email === "") {
    emailErrMsg.innerHTML = "Fill in the email address";
    emailErrMsg.style.color = "red";
    flag = false;
  } else if (!isValidEmail(email)) {
    emailErrMsg.innerHTML = "Invalid email address";
    emailErrMsg.style.color = "red";
    flag = false;
  }

  if (password === "") {
    passwordErrMsg.innerHTML = "Fill in the password";
    passwordErrMsg.style.color = "red";
  } else {
    if (
      !/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(
        password
      )
    ) {
      passwordErrMsg.innerHTML =
        "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*?&)";
      passwordErrMsg.style.color = "red";
      flag = false;
    }
  }
  if (confirmPassword === "") {
    confirmPasswordErrMsg.innerHTML = "Fill in the confirm password";
    confirmPasswordErrMsg.style.color = "red";
    flag = false;
  } else if (password !== confirmPassword) {
    confirmPasswordErrMsg.innerHTML = "Passwords do not match";
    confirmPasswordErrMsg.style.color = "red";
    flag = false;
  }

  // Check if frname, lrname, and rusername only contain letters and whitespace
  if (!/^[a-zA-Z-' ]*$/.test(firstName)) {
    firstNameErrMsg.innerHTML =
      "Only letters and white space allowed for the first name";
    firstNameErrMsg.style.color = "red";
    flag = false;
  }

  if (!/^[a-zA-Z-' ]*$/.test(lastName)) {
    lastNameErrMsg.innerHTML =
      "Only letters and white space allowed for the last name";
    lastNameErrMsg.style.color = "red";
    flag = false;
  }

  if (!/^[a-zA-Z-' ]*$/.test(userName)) {
    userNameErrMsg.innerHTML =
      "Only letters and white space allowed for the username";
    userNameErrMsg.style.color = "red";
    flag = false;
  }

  // Check if the phone number has exactly 11 digits

  // Check if the password meets the specified criteria
  // if (
  //   !/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(
  //     password
  //   )
  // ) {
  //   passwordErrMsg.innerHTML =
  //     "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*?&)";
  //   passwordErrMsg.style.color = "red";
  //   flag = false;
  // }

  // if (password !== confirmPassword) {
  //   confirmPasswordErrMsg.innerHTML = "Passwords do not match";
  //   confirmPasswordErrMsg.style.color = "red";
  //   flag = false;
  // }

  return flag;
}

function isValidEmail(email) {
  // Use a regular expression for basic email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}
