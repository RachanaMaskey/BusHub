<?php
     include("header.php");

    $con=new connec();
    $tbl="route";
    $result=$con->select_all($tbl);
?>

<section class="mt-5">
    <h3 class="text-center" style="color:#064663;"> Our Destinations</h3>
    <div class="container">
        <div class="row">
        <?php
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                        $pik=$con->select("pickup",$row["pickup_id"]);
                        $pikrow=$pik->fetch_assoc();
                        $drp=$con->select("dropplace",$row["drop_id"]);
                        $drprow=$drp->fetch_assoc();
                        ?>
                            <div class="bg-white rounded shadow col-md-3">
                                <img src="<?php echo $row["placeimg"];?>" style="width:100%;height:250px;">
                                <h6 class="text-center mt-2" style="height:30px;"><b><?php echo $row["name"]?></b> </h6>
                                <p><b>Pickup Point:</b> <?php echo $pikrow["pickup_place"]?> </p>
                                <p><b>Destination:</b> <?php echo $drprow["drop_place"]?> </p>
                                <p><b>Duration:</b> <?php echo $row["duration"]?> </p>
                                <a class="btn" href="booking.php" style="background-color:#064663;color:white;width:100%;">Book Ticket</a>
                                <br>
                                <br>
                            </div>
                            <br>
                            <br>
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