<?php
    session_start();
    if(empty($_SESSION["admin_username"]))
    {
        header("Location:index.php");
    }
    else
    {
        include("admin_header.php");
        $con=new connec();
        $tbl="customer";
        $result=$con->select_all($tbl);

       ?>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" style="background-color:#064663;color:white;min-height:550px;">
                            <?php include('admin_sidenavbar.php'); ?>
                        </div>

                        <div class="col-md-10">
                            <h4 class="text-center mt-2" style="color:#064663;">Customers</h4>
                            <!-- <a href="adddropplace.php" style="color:#064663;">Add Pickup Places</a> -->

                            <table class="table mt-5" style="width:100%;" border="2">
                                <thead style="background-color:#064663;color:white;">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Password</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($result->num_rows>0)
                                        {
                                            while($row=$result->fetch_assoc())
                                            {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row["id"]; ?></td>
                                                        <td><?php echo $row["name"]; ?></td>
                                                        <td><?php echo $row["email"]; ?></td>
                                                        <td><?php echo $row["phnum"]; ?></td>
                                                        <td><?php echo $row["password"]; ?></td>
                                                        <td>
                                                            <a href="editcustomer.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Edit</a>
                                                            <a href="deletecustomer.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </section>
       <?php
        include("admin_footer.php");
    }
?>