<html>
    <head>
        <Title> Signup</Title>
        <link rel="stylesheet" href="auth.css">
    </head>
    <body>
        <div class="container">
            <div class="formContainer">
            <h1>Pet Care</h1>
                <form action="../controller/customerSignupController.php" method="POST">
                <div class= "formControl">
                            <span>Name</span>
                            <input type="text"
                                name="name"
                                class="txtField mb"
                                placeholder="Enter your name" >    
                    </div>
                    <div class= "formControl">
                            <span>Email:</span>
                            <input type="email"
                                name="email"
                                class="txtField mb"
                                placeholder="Enter your email" >    
                    </div>
                    <div class= "formControl">
                            <span>Phone</span>
                            <input type="text"
                                name="phone"
                                class="txtField mb"
                                placeholder="Enter your phone" >    
                    </div>
                    <div class= "formControl">
                            <span>Address</span>
                            <input type="text"
                                name="address"
                                class="txtField mb"
                                placeholder="Enter your address" >    
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

                </form>
            </div>
        </div>
    </body>
</html>