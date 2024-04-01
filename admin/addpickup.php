<?php
    session_start();
    if(isset($_POST["btn_insert"]))
    {
        include("../conn.php");
        $pickup_place=$_POST["pickup_place"];

        $con=new connec();
        $sql="Insert into pickup values(0,'$pickup_place')";
        $con->insert($sql,"Value added successfully!!");
        header("Location:viewpickup.php");
    }

    if(empty($_SESSION["admin_username"]))
    {
        header("Location:index.php");
    }
    else
    {
        include("admin_header.php");

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
                                    <input type="text" style="border-radius:50px;" placeholder="Enter name of the place" name="pickup_place" required>
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