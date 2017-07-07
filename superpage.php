<?php
    /*
    * User: Edgar Medina Camarena
    * Date 13/05/17
    * Common Page
   */
    session_start();
    
    if($_SESSION['user'] == null)
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
                        <li class="hov"><a href="#myPage">  HOME    </a></li>
                        <?php 
                            if($_SESSION["role"] == "SUPERADMIN")
                            {
                                echo "<li class='hov'><a href='record.php'>    RECORD    </a></li>";
                            }
                        ?>
                         <?php 
                            if($_SESSION["role"] == "SUPERADMIN")
                            {
                                echo "<li class='hov'><a href='payments.php'>    PAYMENTS    </a></li>";
                            }
                        ?>
                        <li class="hov"><a href="#"> RESOURCES </a></li>
                        <li class="hov"><a href="php/close_session.php">EXIT</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
    <!--JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>