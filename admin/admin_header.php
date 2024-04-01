<?php
    include("../conn.php");
?>


<!doctype html>
    <html lang="en">
        <head>
            <title>Admin dashboard</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

            <link rel="icon" type="image/x-icon" href="/movieticket/images/bus.png">

            <!-- font-awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <nav class="navbar navbar-expand-md navbar-dark" style="background-color:#064663">
                <a class="navbar-brand" href="index.php"><img src="..//images/bushub.png" style="width:80px"></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item ">
                            <h4><a class="nav-link" href="dashboard.php" style="color:white">Admin Panel Online Bus Ticket Booking</a></h4>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php" style="color:white">Welcome Admin</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/index.php" style="color:white">Logout</a>
                        </li>   
                    </ul>
                </div>
            </nav>

                    







