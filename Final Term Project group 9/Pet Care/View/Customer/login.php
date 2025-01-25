<html>
    <head>
        <Title> Login</Title>
        <link rel="stylesheet" href="auth.css">
    </head>
    <body>
        <div class="container">
            <div class="formContainer">
                <h1>Pet Care</h1>
                <form action="../controller/loginController.php" method="POST">
                    <div class= "formControl">
                            <span>Email:</span>
                            <input type="email"
                                name="email"
                                class="txtField mb"
                                placeholder="Enter your email" >    
                    </div>

                    <div classs = "formControl mb">
                        <span class= "label">Password: </span>
                        <input  type="password"
                                name="password"
                                class="txtField mb"
                                placeholder="Enter your Password">
                    </div>
                    <div class = "formControl">
                        <input type="submit" name="submit" class="button">
                        <input type="reset" name="reset" class="button">
                    </div>
                    <div class = "formControl">
                        <span>
                            <a href="customerSignup.php">Not a member? register</a>
                        </span>

                    </div>

                </form>
            </div>
        </div>
    </body>
</html>