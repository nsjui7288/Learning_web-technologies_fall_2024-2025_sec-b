<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pet Care - Doctor Form</title>
</head>
<body>
    <h1 id="head">Pet Care - Doctor Form</h1>

    <form>
        <input type="text" id="name" name="" value="Doctor Name" onblur="validateName()" />
        <p id="nameMsg"></p>

        <input type="email" id="email" name="" value="Doctor Email" onblur="validateEmail()" />
        <p id="emailMsg"></p>

        <input type="text" id="phone" name="" value="Doctor Phone" onblur="validatePhone()" />
        <p id="phoneMsg"></p>

        <input type="button" id="btn" name="" value="Submit" onclick="submitForm()" />
    </form>

    <script>
        function validateName() {
            let name = document.getElementById('name').value;
            if (name === "" || name === "Doctor Name") {
                document.getElementById('nameMsg').innerHTML = "Please type the doctor's name!";
                document.getElementById('nameMsg').style.color = "red";
            } else {
                document.getElementById('nameMsg').innerHTML = "";
            }
        }

        function validateEmail() {
            let email = document.getElementById('email').value;
            if (email === "" || email === "Doctor Email") {
                document.getElementById('emailMsg').innerHTML = "Please type the doctor's email!";
                document.getElementById('emailMsg').style.color = "red";
            } else {
                document.getElementById('emailMsg').innerHTML = "";
            }
        }

        function validatePhone() {
            let phone = document.getElementById('phone').value;
            if (phone === "" || phone === "Doctor Phone") {
                document.getElementById('phoneMsg').innerHTML = "Please type the doctor's phone!";
                document.getElementById('phoneMsg').style.color = "red";
            } else {
                document.getElementById('phoneMsg').innerHTML = "";
            }
        }

        function submitForm() {
            let name = document.getElementById('name').value;
            let email = document.getElementById('email').value;
            let phone = document.getElementById('phone').value;

            if (name === "" || name === "Doctor Name" || email === "" || email === "Doctor Email" || phone === "" || phone === "Doctor Phone") {
                document.getElementById('head').innerHTML = "Please fill out all fields!";
                document.getElementById('head').style.color = "red";
            } else {
                document.getElementById('head').innerHTML = `Doctor ${name}'s details submitted successfully!`;
                document.getElementById('head').style.color = "green";
            }
        }
    </script>
</body>
</html>
