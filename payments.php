<?php
    /*
    * User: Edgar Medina Camarena
    * Date 27/06/17
    * This page is for record the paymamts of the students and teachers.
    */
    session_start();
    
    if($_SESSION['user'] == null or strcmp($_SESSION['role'],"SUPERADMIN") != 0)
    {
        header("location: index.html");
    }
    
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Payments</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/comonpage.css">
        <link rel="stylesheet" href="css/simple-sidebar.css">
        <link rel="stylesheet" href="css/payment.css">
    </head>
    
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
        <!--Navbar-->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <span style="font-size:30px;cursor:pointer" id="menu-toggle">&#9776;</span>
                    <a class="navbar-brand wel-user" href="#myPage"><?php echo "Welcome ".$_SESSION['name'];?></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hov"><a href="superpage.php">  HOME    </a></li>
                        <?php 
                            if($_SESSION["role"] == "SUPERADMIN")
                            {
                                echo "<li class='hov'><a href='record.php'>    RECORD    </a></li>";
                            }
                        ?>
                        <li class="hov"><a href="#myPage"> PAYMENTS </a></li>
                        <li class="hov"><a href="#"> RESOURCES </a></li>                       
                        <li class="hov"><a href="php/close_session.php">EXIT</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#"></a>
                    </li>
                    <li>
                        <a href="#" onclick="logicScreens('studentPay');">Dashboard</a>
                    </li>
                    <li>
                        <a href="#" onclick="logicScreens('teacherPay');">Shortcuts</a>
                    </li>
                    <li>
                        <a href="#">Overview</a>
                    </li>
                    <li>
                        <a href="#">Events</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
        <!-- /#sidebar-wrapper -->
            
             <!-- Page Content -->
            <section id="page-content-wrapper">
                <div class="container-fluid topSection">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>-->
                            <h1>Simple Sidebar</h1>
                            <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Form for capture the payments of students -->
                <div class="container-fluid screenClose" id="studentPay">
                    <form id="form" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nameStu"> Name: </label>
                                    <input type="text" class="form-control" required id="" name="">
                                </div>
                                <div class="form-group">
                                    <label for="flastStu"> Father lastname: </label>
                                    <input type="text" class="form-control" required id="" name="">
                                </div>
                                <div class="form-group">
                                    <label for="mlastStu"> Mother lastname: </label>
                                    <input type="text" class="form-control" required id="" name="">
                                </div>
                                <div class="form-group">
                                    <label for="phoneStu"> Phone number: </label>
                                    <input type="text" class="form-control" required id="" name="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="addressStu"> Module: </label>
                                    <input type="text" class="form-control" required id="" name="">
                                </div>
                                <div class="form-group">
                                    <label for="emailStu"> Quantity: </label>
                                    <input type="email" class="form-control" required id="" name="">
                                </div>
                                <div class="form-group">
                                    <label for="curpStu"> CURP: </label>
                                    <input type="text" class="form-control" required id="" name="">
                                </div>
                                <div class="form-group">
                                    <label for="dateStu"> Start date: </label>
                                    <input type="text" class="form-control" required id="" name="">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="payStudent">Submit</button>
                    </form>
                </div>
                
                 <!-- Form for capture the payments of teachers -->
                <div class="container-fluid screenClose" id="teacherPay">
                    <form id="form" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nameStu"> Namee: </label>
                                    <input type="text" class="form-control" required id="" name="">
                                </div>
                                <div class="form-group">
                                    <label for="flastStu"> Father lastname: </label>
                                    <input type="text" class="form-control" required id="" name="">
                                </div>
                                <div class="form-group">
                                    <label for="mlastStu"> Mother lastname: </label>
                                    <input type="text" class="form-control" required id="" name="">
                                </div>
                                <div class="form-group">
                                    <label for="phoneStu"> Phone number: </label>
                                    <input type="text" class="form-control" required id="" name="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="addressStu"> Module: </label>
                                    <input type="text" class="form-control" required id="" name="">
                                </div>
                                <div class="form-group">
                                    <label for="emailStu"> Quantity: </label>
                                    <input type="email" class="form-control" required id="" name="">
                                </div>
                                <div class="form-group">
                                    <label for="curpStu"> CURP: </label>
                                    <input type="text" class="form-control" required id="" name="">
                                </div>
                                <div class="form-group">
                                    <label for="dateStu"> Start date: </label>
                                    <input type="text" class="form-control" required id="" name="">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="payTeacher">Submit</button>
                    </form>
                </div>
            </section>
            <!-- /#page-content-wrapper -->
        </div>

        
    <!--JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/payments.js"></script>
    <!-- Menu Toggle Script -->
    <!-- Side menu function -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    </body>
</html>