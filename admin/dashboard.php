<?php
    session_start();
    if(empty($_SESSION["admin_username"]))
    {
        header("Location:index.php");
    }
    else
    {
        include("admin_header.php");
       ?>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" style="background-color:#064663;color:white;min-height:550px;">
                            <?php include('admin_sidenavbar.php'); ?>
                        </div>

                        <div class="col-md-10 mt-5">
                            <h4 style="color:#064663;text-align:center;">Admin dashboard</h4>
                            <div class="container mt-5">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 mb-4 px-4">
                                        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box" style="background-color:#064663;text-align:center;">
                                            <img src="../images/1.jpg" width="150px">
                                            <h4 class="mt-3">100+ Buses</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-4 px-4">
                                        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                                            <img src="../images/3.jpg" width="50px">
                                            <h4 class="mt-3">2000+ Customers</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-4 px-4">
                                        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                                            <img src="../images/4.png" width="70px">
                                            <h4 class="mt-3">1500+ reviews</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-4 px-4">
                                        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                                            <img src="../images/5.jpg" width="70px">
                                            <h4 class="mt-3">250+ Staffs</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
       <?php
        include("admin_footer.php");
    }
?>

