<?php
    
    session_start();
    $_SESSION["admin_username"]=null;
    $error="";
    
    
    if(isset($_POST["btn_login"]))
    {
        $email_id=$_POST["log_email"];
        $password_log=$_POST["log_psw"];

        if("admin@gmail.com"==$email_id)
        {
            if("admin123"==$password_log)
            {
                $_SESSION["admin_username"]=$email_id;
                header("Location:viewbooking.php");
            }
            else
            {
                $error="Invalid Password";
            }
               
        }
        else
        {
            $error="Invalid Email";
        }
        
    }
?>





<!doctype html>
<html lang="en">
  <head>
    <title>Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
           * 
           {
            box-sizing: border-box;
            font-family: "Trebuchet MS", Helvetica, sans-serif;
           }

            /* Add padding to containers */
            .container 
            {
            padding: 16px;
            }
           
            /* Full-width input fields */
            textarea,input[type=text],  input[type=password],input[type=tel],input[type=number],input[type=date]
            {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
            background-color:#ddd;
            }

            textarea,input[type=text]:focus, input[type=password]:focus 
            {
            background-color:#ddd;
            outline: none;
            }

            /* Overwrite default styles of hr */
            hr 
            {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
            }

            /*Set a style for the register button*/
            #registerbtn
            {
                /* background-color:white; */
                color:white;
                padding: 16px 20px ;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }
            #registerbtn:hover
            {
                opacity: 1;
            }
            /*Set a style for the login button*/
            #loginbtn
            {
                /* background-color:white; */
                color:white;
                padding: 16px 20px ;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }
            #loginbtn:hover
            {
                opacity: 1;
            }
            /*Add blue text color to links*/
            a
            {
                color: blue;
            }

            .signin
            {
                background-color:#f1f1f1;
                text-align: center;

            }
        </style>
</head>
  <body>
    
    <!-- admin login   -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6" style="margin:auto;">
                <form method="post" >
                    <div class="container card border-0 shadow" style="color:#064663;">
                        <center style="color:#064663;">
                            <h1>Admin Login</h1>
                        </center>
                        <hr>
                        <label for="email"><b>Email</b></label>
                        <input type="text" style="border-radius:50px;" placeholder="Enter Email" name="log_email" id="email" required>
                        <label for="psw"><b>Password</b></label>
                        <input type="password" style="border-radius:50px;" placeholder="Enter password" name="log_psw" id="psw" required>
                        <center>
                            <button type="submit" class="btn" name="btn_login" style="background-color:#064663;color:white;">Login</button>
                        </center>
                    </div>
                </form>
                <div class="container mt-5" style="width=50%;">
                    <div class="row card border-0 shadow" style="color:#064663;width=50%;">
                        <div class="col-md-6" style="margin:auto;">
                            <p style="color:#064663;text-align:center;"><?php echo $error; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>