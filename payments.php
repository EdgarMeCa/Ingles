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
        <title>Start Page</title>
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
                        <a href="#">
                            
                        </a>
                    </li>
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Shortcuts</a>
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
                            <span style="font-size:30px;cursor:pointer">&#9776;</span>
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                            <h1>Simple Sidebar</h1>
                            <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /#page-content-wrapper -->
        </div>

        
    <!--JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    </body>
</html>