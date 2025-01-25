// // login.js

// document.addEventListener("DOMContentLoaded", function () {
//   const loginForm = document.querySelector(
//     "form[action='functions/authcode.php']"
//   );
//   if (loginForm) {
//     loginForm.addEventListener("submit", function (event) {
//       if (!isValidLoginForm(loginForm)) {
//         event.preventDefault(); // Prevent form submission if validation fails
//       }
//     });
//   }
// });

// function isValidLoginForm(loginForm) {
//   const email = loginForm.remail.value;
//   const password = loginForm.rpassword.value;

//   const emailErrMsg = document.getElementById("emailErrMsg");
//   const passwordErrMsg = document.getElementById("passwordErrMsg");

//   emailErrMsg.innerHTML = "";
//   passwordErrMsg.innerHTML = "";

//   let flag = true;

//   if (email === "") {
//     emailErrMsg.innerHTML = "Fill in the email address";
//     emailErrMsg.style.color = "red";
//     flag = false;
//   }

//   if (password === "") {
//     passwordErrMsg.innerHTML = "Fill in the password";
//     passwordErrMsg.style.color = "red";
//     flag = false;
//   }

//   return flag;
// }

// login.js

document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.querySelector(
    "form[action='functions/authcode.php']"
  );

  // Disable the login button initially
  const loginButton = document.querySelector("button[name='login_btn']");
  loginButton.disabled = true;

  if (loginForm) {
    loginForm.addEventListener("input", function () {
      // Update button state on any input change in the form
      updateLoginButtonState(loginForm, loginButton);
    });

    loginForm.addEventListener("submit", function (event) {
      if (!isValidLoginForm(loginForm)) {
        event.preventDefault(); // Prevent form submission if validation fails
      }
    });
  }
});

function updateLoginButtonState(loginForm, loginButton) {
  const isValidForm = isValidLoginForm(loginForm);
  loginButton.disabled = !isValidForm;

  // Set background color to blue when the button is active
  loginButton.style.backgroundColor = isValidForm ? "blue" : "";
}

function isValidLoginForm(loginForm) {
  const email = loginForm.remail.value;
  const password = loginForm.rpassword.value;

  const emailErrMsg = document.getElementById("emailErrMsg");
  const passwordErrMsg = document.getElementById("passwordErrMsg");

  emailErrMsg.innerHTML = "";
  passwordErrMsg.innerHTML = "";

  let flag = true;

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

  // if (password === "") {
  //   passwordErrMsg.innerHTML = "Fill in the password";
  //   passwordErrMsg.style.color = "red";
  //   flag = false;
  // }

  return flag;
}
function isValidEmail(email) {
  // Use a regular expression for basic email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}
