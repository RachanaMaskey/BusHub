<?php
     session_start();
    if(empty($_SESSION["username"]))
    {
        header("Location:index.php");
    }
    else
    {
        include("header.php");
    }

    $con=new connec();
    $result=$con->select_showdt();



    $checked_value=0;
    if(isset($_POST["btn-booking"]))
    {
        $con=new connec();

        $cust_id=$_POST["cust_id"];
        $route_id=$_POST["route_id"];
        $no_ticket=$_POST["no_ticket"];
        $booking_date=$_POST["booking_date"];
        $total_amount=(600* $no_ticket);

        $seat_number=$_POST["seat_dt"];
        $seat_arr=explode(", ",$seat_number);

        // foreach($seat_arr as $item)
        // {
        //     $sql="insert into seat_reserved values(0,$route_id,$cust_id,'$item',true)";
        //     $abc= $con->insert_lastid($sql);
        // }
       
        $sql="Insert into seat_detail values(0,$cust_id,$route_id,$no_ticket)";
        $seat_dt_id=$con->insert_lastid($sql);

        $sql="Insert into booking values(0,$cust_id,$no_ticket,$seat_dt_id,$route_id,'$booking_date',$total_amount)";
        $con->insert($sql,"Your tickets are successfully booked!!!");
    }


?>

<script>
    $(document).ready(function()
    {
        for(i=1;i<=10;i++)
        {
            for(j=1;j<=4;j++)
            {
                $('#seat_chart').append('<div class="col-md-2 mt-2 mb-2 ml-2 mr-2 text-center" style="background-color:#747264;color:white"><input type="checkbox" id="seat" value="R'+(i+'S'+j)+'" name="seat_chart[]" class="mr-2 col-md-2 mb-2" onclick="checkboxtotal();">R'+(i+'S'+j)+'</div>')
            }
        }
    });

    function checkboxtotal()
    {
        var seat=[];
        $('input[name="seat_chart[]"]:checked').each(function()
        {
            seat.push($(this).val());
        });

        var st=seat.length;
        document.getElementById('no_ticket').value=st;
        var total="Rs. "+(st*600);
        $('#price_detail').text(total);

        $('#seat_dt').val(seat.join(","));
    }
</script>


<section class="mt-5">
    <h3 class="text-center mt-3" style="color:#064663;">Lets Book Tickets</h3>
       <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div id="seat-map" id="seatCharts">
                    <center> <h6 class="text-center mt-3 mr-5" style="color:#064663;;">Select Seats</h6></center>
                    <hr>
                    <label class="text-center" style="width:78%;background-color:#064663;color:white;padding:2%">
                        Seat Arrangement
                    </label>
                    <div class="row" id="seat_chart">
                    </div>
                </div>
                <!-- <h6 class="mt-5" style="color:#064663;">TOTAL TICKET PRICE</h6>
                <p class="mt-1" id="price_detail" style="color:#064663;;"></p> -->
            </div>

            <div class="col-md-7">
                <form method="post">
                    <div class="container1" style="color:#064663">
                        <center style="color:#064663;">
                            <p><h6>Please fill in this form to book tickets</h6></p>
                        </center>
                        <hr>
                        <label for="usrname" style="color:#064663"><b>Customer Id</b></label>
                        <input type="number" style="border-radius:30px;"  name="cust_id" required value=<?php echo $_SESSION["cust_id"];?>>
                        <br>

                        <label for="email" style="color:#064663"><b>Destination</b></label>
                        <!-- <input type="text" style="border-radius:30px;" name="route_id" required> -->
                        <div class="form-group">
                          <select class="form-control" name="route_id" style="border-radius:30px;background-color:#f1f1f1;">
                            <option>Select Destination</option>
                            <?php
                                if($result->num_rows>0)
                                {
                                    while($row=$result->fetch_assoc())
                                    {
                                        echo ' <option value="'.$row["id"].'">'.$row["route_name"].'</option>';
                                    }

                                }
                            ?>
                          </select>
                        </div>

                        <label for="psw" style="color:#064663"><b>Number of Tickets</b></label>
                        <input type="number" style="border-radius:30px" id="no_ticket" name="no_ticket" required>

                        <label for="psw-repeat" style="color:#064663"><b>Seat Details</b></label>
                        <input type="text" style="border-radius:30px" id="seat_dt" name="seat_dt" required>

                        <label for="number" style="color:#064663"><b>Booking Date</b></label>
                        <input type="date" style="border-radius:30px" name="booking_date" required>

                        <h6 style="color:#064663;">Ticket Price:</h6>
                        <p class="mt-1" id="" style="color:#064663;;">600</p>
                        <h6 style="color:#064663;">Total Ticket Price:</h6>
                        <p class="mt-1" id="price_detail" style="color:#064663;;"></p>
                        
                        <center>
                            <button type="submit" name="btn-booking" class="btn" style="background-color:#064663;color:white">Confirm Booking</button>
                        </center>
                        <hr>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php
include("footer.php");
?>