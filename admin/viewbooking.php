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
        $sql="SELECT booking.id,booking.no_ticket,booking.booking_date,booking.total_amount,customer.id,seat_detail.seat_no,route.name FROM busticket. booking,customer,seat_detail,route where booking.route_id=route.id AND booking.cust_id=customer.id AND booking.seat_dt_id=seat_detail.id;";
        $result=$con->select_by_query($sql);

       ?>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" style="background-color:#064663;color:white;min-height:550px;">
                            <?php include('admin_sidenavbar.php'); ?>
                        </div>

                        <div class="col-md-10">
                            <h4 class="text-center mt-2" style="color:#064663;">Booking details</h4>
                            <!-- <a href="addroute.php" style="color:#064663;">Add Route</a> -->

                            <table class="table mt-5" style="width:100%;" border="2">
                                <thead style="background-color:#064663;color:white;">
                                    <tr>
                                        <th>Id</th>
                                        <th>Passenger Id</th>
                                        <th>Number of Tickets</th>
                                        <th>Number of Seats</th>
                                        <th>Destination</th>
                                        <th>Booking Date</th>
                                        <th>Total Amount</th>
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
                                                        <td><?php echo $row["id"]; ?></td>
                                                        <td><?php echo $row["no_ticket"]; ?></td>
                                                        <td><?php echo $row["seat_no"]; ?></td>
                                                        <td><?php echo $row["name"]; ?></td>
                                                        <td><?php echo $row["booking_date"]; ?></td>
                                                        <td><?php echo $row["total_amount"]; ?></td>
                                                        <td>
                                                            <a href="editbookinh.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Edit</a>
                                                            <a href="deletebooking.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
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