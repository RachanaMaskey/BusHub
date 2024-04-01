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
        $sql="SELECT route.id,route.name,route.placeimg,pickup.pickup_place,dropplace.drop_place,route.duration FROM route,pickup,dropplace where route.pickup_id=pickup.id AND route.drop_id=dropplace.id;";
        $result=$con->select_by_query($sql);

       ?>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" style="background-color:#064663;color:white;min-height:550px;">
                            <?php include('admin_sidenavbar.php'); ?>
                        </div>

                        <div class="col-md-10">
                            <h4 class="text-center mt-2" style="color:#064663;">Route Lists</h4>
                            <a href="addroute.php" style="background-color:#064663;color:white;" class="btn">Add Route</a>

                            <table class="table mt-5" style="width:100%;" border="2">
                                <thead style="background-color:#064663;color:white;">
                                    <tr>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Pickup Destination</th>
                                        <th>Final Destination</th>
                                        <th>Duration</th>
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
                                                        <td><img src="../<?php echo $row["placeimg"]; ?>" alt="pic" style="height:100px;width:150px;"></td>
                                                        <td><?php echo $row["name"]; ?></td>
                                                        <td><?php echo $row["pickup_place"]; ?></td>
                                                        <td><?php echo $row["drop_place"]; ?></td>
                                                        <td><?php echo $row["duration"]; ?></td>
                                                        <td>
                                                            <a href="editroute.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Edit</a>
                                                            <a href="deleteroute.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
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