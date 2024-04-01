<?php
    include("header.php");
    // $con=new connec();
    // $tbl="slider";
    // $result=$con->select_all($tbl);
    // $result1=$con->select_all($tbl);

?>

<section style="min-height:450px;">
    <div class="container">
        <div class="col-md-12">
            <center style="color:#064663;">
                <h1>About Us</h1>
            </center>
        </div>
        <div class="row" style="color:black;">
            <div class="col-md-6 mt-3 mb-3 pl-5" style="border-radius:60px;background-color:#064663;">
                <div class="mt-5 mb-5 ml-3 mr-5">
                    <center>
                        <img src="images/bushub.png"  alt="aboutus"style="width:100%;height:250px;"> 
                    </center>  
                </div>
            </div>
                        
            <div class="col-md-6">
                <h5 class="ml-5 mt-3"><center>Welcome to Bus Hub</center></h5>
                <p class="ml-5" style="text-align:center;"> 
                At Bus Hub, we're passionate about making your travel experience as seamless and enjoyable as possible. Whether you're planning a quick getaway or a long-distance journey, we're here to simplify the process of booking your bus tickets.
                <br>
                <br>
                <b>Our Mission</b>
                <br>
                Our mission is simple: to provide you with convenient, reliable, and affordable bus ticket booking services. We understand the importance of hassle-free travel, and we're committed to offering you a platform that delivers on these values.
                </p>             
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="bg-white rounded shadow p-4 ml-1" style="background-color:#064663;">
            <iframe class="w-100 rounded mb-4" height="500px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.061457522327!2d85.30634876438478!3d27.715388681746795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fca0424275%3A0x4094b9db85d64504!2sPaknajol%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1658571114665!5m2!1sen!2snp" loading="lazy"></iframe>
            <h5>Address</h5>
            <a href="https://goo.gl/maps/T7aDGbDZoTsW3ySE9" target="_blank" class="d-line-block text-decoration-none text-dark mb-2">
            <i class="bi bi-geo-alt-fill"></i>Paknajol,Kathmandu,Nepal
            </a>
        </div>
    </div>
    <hr>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/1.jpg" width="150px">
                    <h4 class="mt-3">100+ Buses</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/3.jpg" width="70px">
                    <h4 class="mt-3">2000+ Customers</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/4.png" width="70px">
                    <h4 class="mt-3">1500+ reviews</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/5.jpg" width="70px">
                    <h4 class="mt-3">250+ Staffs</h4>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
include("footer.php");
?>