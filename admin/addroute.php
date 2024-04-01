<?php
    session_start();
    if(empty($_SESSION["admin_username"]))
    {
        header("Location:index.php");
    }
    else
    {
        include("admin_header.php");

        if(isset($_POST["btn_insert"]))
        {
            $name=$_POST["route_name"];
            $image=$_POST["route_image"];
            $pickupplace=$_POST["pickup_place"];
            $dropplace=$_POST["drop_place"];

            $con=new connec();
            $sql="Insert into route values(0,'$name','$email','$phnum','$confirm_password')";
            $con->insert($sql,"Route added successfully!!");
        }
       

       ?>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" style="background-color:#064663;color:white;min-height:550px;">
                            <?php include('admin_sidenavbar.php'); ?>
                        </div>

                        <div class="col-md-10">
                            <h4 class="text-center mt-2" style="color:#064663;">Add Route</h4>
                            <hr>
                            <form method="post" >
                                <div class="container card border-0 shadow" style="color:#064663;">
                                    <label for="email"><b>Name</b></label>
                                    <input type="text" style="border-radius:50px;" placeholder="Enter name of the place" name="route_name" required>
                                    <label for="email"><b>Image</b></label>
                                    <input type="text" style="border-radius:50px;" placeholder="Enter image of the place" name="route_image" required>
                                    <label for="email"><b>Pickup Place</b></label>
                                    <input type="text" style="border-radius:50px;" placeholder="Enter pickup place" name="pickup_place" required>
                                    <label for="email"><b>Final Destination</b></label>
                                    <input type="text" style="border-radius:50px;" placeholder="Enter final place" name="drop_place" required>
                                    <center>
                                        <button type="submit" class="btn" name="btn_insert" style="background-color:#064663;color:white;">Add</button>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
            </section>
       <?php
        include("admin_footer.php");
    }
?>