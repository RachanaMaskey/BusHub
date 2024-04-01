<?php
    session_start();

    $n="";
    $e="";
    $m="";
    $g="";
    if(isset($_POST["btn_update"]))
    {
        include("../conn.php");
        $name=$_POST["name"];
        $email=$_POST["email"];
        $no=$_POST["no"];
        $msg=$_POST["msg"];

        $id=$_GET["id"];
        $con=new connec();
        $sql="update contact set name='$name', email='$email', no='$no', msg='$msg' WHERE id=$id ";
        $con->update($sql,"Value updated successfully!!");
        header("Location:viewcontact.php");
    }

    if(empty($_SESSION["admin_username"]))
    {
        header("Location:index.php");
    }
    else
    {
        include("admin_header.php");

       if(isset($_GET["id"]))
       {
            $id=$_GET["id"];
            
            $con=new connec();
            $tbl="contact";
            $result=$con->select($tbl,$id);
            if($result->num_rows>0)
            {
                $row=$result->fetch_assoc();
                $n=$row["name"];
                $e=$row["email"];
                $m=$row["no"];
                $g=$row["msg"];
            }
       }

       ?>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" style="background-color:#064663;color:white;min-height:550px;">
                            <?php include('admin_sidenavbar.php'); ?>
                        </div>

                        <div class="col-md-10">
                            <h4 class="text-center mt-2" style="color:#064663;">Edit Destination Details</h4>
                            <hr>
                            <form method="post" >
                                <div class="container card border-0 shadow" style="color:#064663;">
                                    <label for="email"><b>Name</b></label>
                                    <input type="text" style="border-radius:50px;" placeholder="Enter name of the place" name="name" value="<?php echo $n; ?> " required>
                                    <label for="email"><b>Email Address</b></label>
                                    <input type="text" style="border-radius:50px;" placeholder="Enter name of the place" name="email" value="<?php echo $e; ?> " required>
                                    <label for="email"><b>Mobile Number</b></label>
                                    <input type="text" style="border-radius:50px;" placeholder="Enter name of the place" name="no" value="<?php echo $m; ?> " required>
                                    <label for="email"><b>Message</b></label>
                                    <input type="text" style="border-radius:50px;" placeholder="Enter name of the place" name="msg" value="<?php echo $g; ?> " required>
                                    <center>
                                        <button type="submit" class="btn" name="btn_update" style="background-color:#064663;color:white;">Update</button>
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