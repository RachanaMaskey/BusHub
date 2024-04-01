<?php
    include("conn.php");
    $con=new connec();
    if(!isset($_SESSION))
    {
        session_start();
    }
   
    if(isset($_GET["action"]))
    {
        if($_GET["action"]== "logout")
        {
            $_SESSION["username"]=null;
            $_SESSION["cust_id"]=null;
        }
    }

    if(empty($_SESSION["username"]))
    {
        $_SESSION["ul"]='<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#modelId" style="color:white">Register</a></li> <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#modelId1" style="color:white">Login</a></li>';
    }

    if(isset($_POST["btn_login"]))
    {
        $email_id=$_POST["log_email"];
        $password_log=$_POST["log_psw"];

        $result=$con->select_login("customer", $email_id);
        if($result->num_rows>0)
        {
            $row=$result->fetch_assoc();
            if($row["email"]==$email_id && $row["password"]==$password_log)
            {
                $_SESSION["username"]=$row["name"];
                $_SESSION["cust_id"]=$row["id"];
                $_SESSION["ul"]='<li class="nav-item"><a class="nav-link" style="color:white">Welcome '.$_SESSION["username"].'!!!</a></li><li class="nav-item"><a class="nav-link" style="color:white" href="index.php?action=logout">Logout</a></li>';
            }
            else
            {
                    echo '<script>alert("Invalid Password");</script>';
            }
        }
        else
        {
                echo '<script>alert("Invalid Email");</script>';
        }
    }

    if(isset($_POST["btn_reg"]))
    {
        $name=$_POST["reg_fullname"];
        $email=$_POST["reg_email"];
        $phnum=$_POST["reg_number"];
        $password=$_POST["regpsw"];
        $confirm_password=$_POST["regpsw-repeat"];

        if($password== $confirm_password)
        {
            $sql="Insert into customer values(0,'$name','$email','$phnum','$confirm_password')";
            $con->insert($sql,"Customer registered successfully.Now you can login.THANK YOU!!!");
        }
        else
        {
            ?>
            <script>alert("Confirm password not matched");</script>
            <?php
            // echo "Confirm password not matched";
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Bus Ticket Booking</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="/movieticket/images/bus.png">

        <!-- font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet"  href="style.css">
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
        <script>
            $(document).ready(function(){
                $(#modelId1).show();
            });
        </script>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color:#064663">
            <a class="navbar-brand" href="index.php"><img src="images/bushub.png" style="width:70px"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php" style="color:white">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="route.php" style="color:white">Routes</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="booking.php" style="color:white">Book Ticket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php" style="color:white">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php" style="color:white">About Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php echo $_SESSION["ul"]; ?>
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#modelId" style="color:white">Register</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#modelId1" style="color:white">Login</a>
                    </li>    -->
                </ul>
                <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->
            </div>
        </nav>
    
    <!--Register Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#064663;color:white;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="container1" id="registerbtn" >
                            <center style="color:#064663;">
                                <h1>Register</h1>
                                <p><h4>Please fill in this form to create an account</h4></p>
                            </center>
                            <hr>

                            <label for="username" style="color:#064663"><b>Full Name</b></label>
                            <input type="text" style="border-radius:50px;" placeholder="Enter your full name" name="reg_fullname" required>
                            <label for="email" style="color:#064663"><b>Email</b></label>
                            <input type="text" style="border-radius:50px;" placeholder="Enter Email" name="reg_email" id="email" required>
                            <label for="number" style="color:#064663"><b>Mobile Number</b></label>
                            <input type="text" style="border-radius:50px;" placeholder="Enter your mobile number" name="reg_number" id="number" required>
                            <label for="psw" style="color:#064663"><b>Password</b></label>
                            <input type="password" style="border-radius:50px;" placeholder="Enter password" name="regpsw" id="psw" required>
                            <label for="psw-repeat" style="color:#064663"><b>Confirm Password</b></label>
                            <input type="password" style="border-radius:50px;" placeholder="Repeat password" name="regpsw-repeat" id="psw-repeat" required>
                            <center>
                                <button type="submit" class="btn" name="btn_reg" style="background-color:#064663;color:white">Register</button>
                            </center>
                            <hr>
                        </div>
                        <div class="container signin">
                            <p>Already have an account? <a href="#" style="color:blue" data-toggle="modal" data-target="#modelId1" data-dismiss="modal">Login In</a></p>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                </div> -->
            </div>
        </div>
    </div>

    <!--Login Modal -->
    <div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#064663;color:white">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="container" style="color:#064663;">
                            <center style="color:#064663;">
                                <h1>Login</h1>
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
                </div>
            </div>
        </div>
    </div>
   
 