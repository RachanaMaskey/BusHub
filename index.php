<?php
    session_start();
    include("header.php");

    $con=new connec();
    $tbl="slider";
    $result=$con->select_all($tbl);
    $result1=$con->select_all($tbl);

    if(empty($_SESSION["username"]))
    {
        ?>
            <script>
                $(document).ready(function(){
                    $('#modelId1').modal('show');
                });
            </script>
        <?php
    }

?>

<section style="min-height:450px;background-color:FFFC9B;">
    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <?php
            if($result->num_rows>0)
            {
                $i=0;
                echo '<ol class="carousel-indicators">';
                while($row=$result->fetch_assoc())
                {
                    if($i==0)
                    {
                        echo '<li data-target="#carouselId" data-slide-to="'.$i.'" class="active"></li>';
                    }
                    else
                    {
                        echo '<li data-target="#carouselId" data-slide-to="'.$i.'"></li>';
                    }
                    $i++;
                }
                echo '</ol>';
            }
        ?>
        <!-- <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
        </ol> -->
        <div class="carousel-inner" role="listbox">
            <?php
                if($result1->num_rows>0)
                {
                    $j=0;
                    while($row=$result1->fetch_assoc())
                    {
                        if($j==0)
                        {
                           ?>
                           <div class="carousel-item active">
                                <img src="<?php echo $row["img_path"];?>" alt="<?php echo $row["alt"];?>" style="width:100%;height:500px;">
                            </div>
                           <?php
                        }
                        else
                        {
                           ?>
                           <div class="carousel-item">
                                <img src="<?php echo $row["img_path"];?>" alt="<?php echo $row["alt"];?>" style="width:100%;height:500px;">
                            </div>
                           <?php
                        }
                        $j++;   
                    }
                }
            ?>
            <!-- <div class="carousel-item active">
                <img src="images/first.jpg" alt="First slide" style="width:100%;height:500px;">
            </div>
            <div class="carousel-item">
                <img src="images/second.jpg" alt="Second slide" style="width:100%;height:500px;">
            </div>
            <div class="carousel-item">
                <img src="images/third.jpg" alt="Third slide" style="width:100%;height:500px;">
            </div> -->
        </div>
        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- our destinations -->
    <h2 class="mt-5 pt-4 md-4 text-center fw-bold h-font" style="color:#064663">Our Destinations</h2>
    <hr>
    <div class="container">
        <div class="row">
                <div class="card border-0 shadow" style="max-width: 390px; margin: auto;">
                    <img src="images/places/bandipur.jpg" class="card-img-top" >
                    <div class="card-body">
                        <h5 style="color:#064663;">Bandipur</h5>
                    </div>
                </div>
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="images/places/chitwan.jpg" class="card-img-top" >
                    <div class="card-body">
                        <h5 style="color:#064663;">Chitwan</h5>
                    </div>
                </div>
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="images/places/lumbini.jpg" class="card-img-top" >
                    <div class="card-body">
                        <h5 style="color:#064663;">Lumbini</h5>
                    </div>
                </div>
            <div class="col-lg-12 text-center mt-5" style="border-radius:60px;background-color:#064663;color:white;">
                <a href="route.php" class="btn" style="color:white;">Show more details</a>
            </div>
        </div>
    </div>

    <!-- facilities -->
    <h2 class="mt-5 pt-4 md-4 text-center fw-bold h-font" style="color:#064663">Our Facilities</h2>
    <hr>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-3 col-md-3 text-center bg-white rounded shadow py-4 my-3">
                <img src="images/features/1.png" width="80px">
                <h5 class="mt-3">WiFi</h5>
            </div>
            <div class="col-lg-3 col-md-3 text-center bg-white rounded shadow py-4 my-3">
                <img src="images/features/2.jpg" width="80px">
                <h5 class="mt-3">Television</h5>
            </div>
            <div class="col-lg-3 col-md-3 text-center bg-white rounded shadow py-4 my-3">
                <img src="images/features/3.jpg" width="80px">
                <h5 class="mt-3">AC</h5>
            </div>
            <div class="col-lg-3 col-md-3 text-center bg-white rounded shadow py-4 my-3">
                <img src="images/features/4.png" width="80px">
                <h5 class="mt-3">Comfartable Seats</h5>
            </div>
        </div>
    </div>

</section>

<?php
include("footer.php");
?>