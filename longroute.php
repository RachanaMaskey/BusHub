<?php
    include("header.php");
    include("conn.php");

    $con=new connec();
    $tbl="longroute";
    $result=$con->select_all($tbl);


?>

<section class="mt-5">
    <h3 class="text-center" style="color:#064663;">Long Route Destinations</h3>
    <div class="container">
        <div class="row">
        <?php
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                        $pik=$con->select("pickup_lg",$row["pickup_id"]);
                        $pikrow=$pik->fetch_assoc();
                        $drp=$con->select("dropplace_lg",$row["drop_id"]);
                        $drprow=$drp->fetch_assoc();
                        ?>
                            <div class="col-md-3">
                                <img src="" style="width:100%;height:250px;">
                                <h6 class="text-center mt-2" style="height:30px;"><b><?php echo $row["name"]?></b> </h6>
                                <p><b>Pick Up Destination:</b> <?php echo $pikrow["pickup_place"]?> </p>
                                <p><b>Drop Destination:</b> <?php echo $drprow["drop_place"]?> </p>
                                <p><b>Duration:</b> <?php echo $row["duration"]?> </p>
                                <a class="btn" href="booking.php" style="background-color:#064663;color:white;width:100%;">Book Ticket</a>
                            </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</section>

<?php
include("footer.php");
?>