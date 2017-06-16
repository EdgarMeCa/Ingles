<?php
    /*
    *User: Edgar Medina Camarena
    *Date 13/05/17
    * Common Page
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
        <title>Pagina de Inicio</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <link rel="stylesheet" href="css/comonpage.css">
        <link rel="stylesheet" href="css/record.css">
    </head>
    
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" onload="cerrados();">
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
                        <li class="hov"><a href="superpage.php"> HOME    </a></li>
                        <li class='hov'><a href="#myPage"> RECORD </a></li>
                        <li class="hov"><a href="#"> RESOURCES </a></li>
                        <li class="hov"><a href="#"> CONTACT </a></li>
                        <li class="hov"><a href="php/close_session.php">EXIT</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="container space-top alert alert-danger text-center">
            <h4>YOU MUST CREATE AN ACCESS BEFORE A USER</h4>
        </section>
        
        <section class="container space-form alert alert-success">
            <h4>Access</h4>
            <form class="form-inline" action="php/insertData.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="user" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="text" class="form-control" id="pwd" name="pass" required>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="STUDENT">STUDENT</option>
                        <option value="TEACHER">TEACHER</option>
                        <option value="ADMIN">  ADMIN  </option>
                    </select>
                </div>
                  <div class="form-group">
                    <label for="role">Region:</label>
                    <select class="form-control" id="region" name="region" required>
                        <option value="AGUASCALIENTES">AGUASCALIENTES</option>
                        <option value="DURANGO">DURANGO</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="access">Submit</button>
            </form> 
        </section>
        
        <section class="container space-form alert alert-success" id="student">
            <div class="row ">
                <div class="col-lg-10">
                    <h4>Record new student</h4>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-success" id="openStu">Open</button>
                    <button type="button" class="btn btn-warning" id="closeStu">Close</button>
                </div>
            </div>
            
            <form id="form-student">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nameStu"> Name: </label>
                            <input type="text" class="form-control" required id="nameStu">
                        </div>
                        <div class="form-group">
                            <label for="flastStu"> Father lastname: </label>
                            <input type="text" class="form-control" required id="flastStu">
                        </div>
                        <div class="form-group">
                            <label for="mlastStu"> Mother lastname: </label>
                            <input type="text" class="form-control" required id="mlastStu">
                        </div>
                        <div class="form-group">
                            <label for="phoneStu"> Phone number: </label>
                            <input type="text" class="form-control" required id="phoneStu">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="addressStu"> Address: </label>
                            <input type="text" class="form-control" required id="addressStu">
                        </div>
                        <div class="form-group">
                            <label for="emailStu"> Email: </label>
                            <input type="text" class="form-control" required id="emailStu">
                        </div>
                         <div class="form-group">
                            <label for="curpStu"> CURP: </label>
                            <input type="text" class="form-control" required id="curplStu">
                        </div>
                         <div class="form-group">
                            <label for="dateStu"> Start date: </label>
                            <input type="text" class="form-control" required id="dateStu" name="date">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>
        
         <section class="container space-form alert alert-success" id="teacher">
            <div class="row ">
                <div class="col-lg-10">
                    <h4>Record new teacher</h4>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-success" id="openTea">Open</button>
                    <button type="button" class="btn btn-warning" id="closeTea">Close</button>
                </div>
            </div>
            
            <form id="form-teacher">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nameTea"> Name: </label>
                            <input type="text" class="form-control" required id="nameTea">
                        </div>
                        <div class="form-group">
                            <label for="flastTea"> Father lastname: </label>
                            <input type="text" class="form-control" required id="flastTea">
                        </div>
                        <div class="form-group">
                            <label for="mlastTea"> Mother lastname: </label>
                            <input type="text" class="form-control" required id="mlastTea">
                        </div>
                        <div class="form-group">
                            <label for="phoneTea"> Phone number: </label>
                            <input type="text" class="form-control" required id="phoneTea">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="addressTea"> Address: </label>
                            <input type="text" class="form-control" required id="addressTea">
                        </div>
                        <div class="form-group">
                            <label for="emailTea"> Email: </label>
                            <input type="text" class="form-control" required id="emailTea">
                        </div>
                        <div class="form-group">
                            <label for="curpTea"> CURP: </label>
                            <input type="text" class="form-control" required id="curplTea">
                        </div>
                         <div class="form-group">
                            <label for="dateTea"> Start date: </label>
                            <input type="text" class="form-control" required id="dateTea" name="date">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>
        
       <!--JavaScript-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <script>
            //This is for form student
            $(document).ready(function(){
                $("#closeStu").click(function(){
                    $("#form-student").hide();
                });
                $("#openStu").click(function(){
                    $("#form-student").show();
                });
            });
            //This is for form teacher
             $(document).ready(function(){
                $("#closeTea").click(function(){
                    $("#form-teacher").hide();
                });
                $("#openTea").click(function(){
                    $("#form-teacher").show();
                });
            });
            //Date picker
            $(document).ready(function(){
                var date_input=$('input[name="date"]'); //our date input has the name "date"
                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                var options={
                    format: 'dd/mm/yyyy',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                    orientation: "botton top",
                };
                date_input.datepicker(options);
            })
</script>
    </body>
</html>