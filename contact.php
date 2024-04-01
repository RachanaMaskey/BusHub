<?php
include("header.php");
if(isset($_POST["btn_submit"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $no=$_POST["number"];
    $msg=$_POST["message"];

    $sql="Insert into contact values(0,'$name','$email','$no','$msg')";
    $con=new connec();
    $con->insert($sql,"We will contact you soon on your mail address.THANK YOU!!!");
}
?>

<section style="min-height:450px;">
    <div class="container">
        <div class="col-md-12">
            <center style="color:#064663;">
                <h1>Contact Us</h1>
                <h4>GET IN TOUCH</h4>
                <p>
                    We'd love to talk about how we can work together.
                    Send us a message below and we'll respond as soon as possible
                </p>
            </center>
        </div>
        <div class="row" style="color:white;">
            <div class="col-md-6 mt-3 mb-3 pl-5" style="border-radius:50px;background-color:#064663;"> 
                <h2 class="mt-5" style="color:white;">Contact Information</h2>
                <p class="mt-1">
                    Our team will get back to you soon
                </p>
                <p class="mt-5 pl-4;"><i class="fa fa-phone fa-2x mt-3 pl-4;"></i>&nbsp;+01-4250281</p>
                <p class="mt-5 pl-4;"><i class="fa fa-envelope fa-2x mt-3 pl-4;"></i>&nbsp;busbooking@gmail.com</p>
                <p class="mt-5 pl-4;"><i class="fa fa-map-marker fa-2x mt-3 pl-4;"></i>&nbsp;Kathmandu,Bagmati,Nepal</p>

                <h2 class="mt-5" style="color:white;">Join Us</h2>
                <div class="mb-5">
                    <a href="#" class="mt-5;" style="color:white;"><i class="fa fa-facebook-square fa-2x mt-3;">&nbsp;&nbsp;</i></a>
                    <a href="#" class="mt-5 ml-3;" style="color:white;"><i class="fa fa-instagram fa-2x mt-3;">&nbsp;&nbsp;</i></a>
                    <a href="#" class="mt-5 ml-3;" style="color:white;"><i class="fa fa-twitter-square fa-2x mt-3;">&nbsp;&nbsp;</i></a>
                    <a href="#" class="mt-5 ml-3;" style="color:white;"><i class="fa fa-linkedin-square fa-2x mt-3;"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <form method="post">
                    <div class="container1" id="registerbtn" >
                        <label for="username" style="color:#064663"><b>Your Name</b></label>
                        <input type="text" style="border-radius:50px;" placeholder="Enter your name" name="name" required>
                        <label for="email" style="color:#064663"><b>Email</b></label>
                        <input type="text" style="border-radius:50px;" placeholder="Enter Email" name="email" id="email" required>
                        <label for="number" style="color:#064663"><b>Number</b></label>
                        <input type="text" style="border-radius:50px;" placeholder="Enter number" name="number" id="number" required>
                        <label for="message" style="color:#064663"><b>Message</b></label>
                        <textarea name="message" id="message" rows="5" style="resize:none;width:100%;border-radius:50px;"></textarea>
                        <center>
                            <button type="submit" name="btn_submit" class="btn" style="background-color:#064663;color:white">Send Message</button>
                        </center>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>


<?php
include("footer.php");
?>