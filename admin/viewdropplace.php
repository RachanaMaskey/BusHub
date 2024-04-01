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
        $tbl="dropplace";
        $result=$con->select_all($tbl);

       ?>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" style="background-color:#064663;color:white;min-height:550px;">
                            <?php include('admin_sidenavbar.php'); ?>
                        </div>

                        <div class="col-md-10">
                            <h4 class="text-center mt-2" style="color:#064663;">Destinations</h4>
                            <a href="adddropplace.php" class="btn" style="background-color:#064663;color:white;">Add Destinations</a>

                            <table class="table mt-5" style="width:100%;" border="2">
                                <thead style="background-color:#064663;color:white;">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
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
                                                        <td><?php echo $row["drop_place"]; ?></td>
                                                        <td>
                                                            <a href="editdropplace.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Edit</a>
                                                            <a href="deletedropplace.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
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