<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pet Care Doctor Finder</title>
</head>
<body>
    <h1 id="head">Pet Care Doctor Finder</h1>

    <form>
        <label for="name">Doctor Name:</label>
        <input type="text" id="name" placeholder="Enter Doctor Name" />
        <input type="button" value="Find Doctor" onclick="ajax()" />
        <input type="button" value="Other Task" onclick="alert('This is the second task')" />
    </form>

    <script>
        function ajax() {
            let name = document.getElementById('name').value;

        
            let json = { 'name': name };
            let data = JSON.stringify(json);

            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', 'getDoctor.php', true);
            xhttp.setRequestHeader("Content-type", "application/json");
            xhttp.send(data);

            xhttp.onreadystatechange = function () {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        try {
        
                            let doctor = JSON.parse(this.responseText);

                            
                            if (doctor.success) {
                                document.getElementById('head').innerHTML = 
                                    `Doctor: ${doctor.data.name}, Phone: ${doctor.data.phone}`;
                            } else {
                                document.getElementById('head').innerHTML = doctor.message;
                            }
                        } catch (e) {
                            console.error("Error parsing JSON:", e);
                            document.getElementById('head').innerHTML = "Invalid server response.";
                        }
                    } else {
                        document.getElementById('head').innerHTML = 
                            `Error: Unable to fetch data (Status: ${this.status})`;
                    }
                }
            };
        }
    </script>
</body>
</html>
