<?php
    /*
    * User: Edgar Medina Camarena
    * Date 16/06/17
    * These function insert the data into database.
    * Any function that inserts data must be here.
    */
    include 'connection.php';

    if(isset($_POST['access']))
    {
        $connection = openConnection();
        createNewAccess($_POST['user'],$_POST['pass'],$_POST['role'],$_POST['region'],$connection);
    }


    function createNewAccess($user,$pass,$role,$region,$connection){
        
        $query = "INSERT INTO acceso (idAcceso,Username,Password,Rol,Region) VALUES (NULL,:User,:Pass,:Role,:Region)";
        
        try
        {
            $sentence = $connection -> prepare($query);
            $sentence -> bindParam(":User",$user);
            $sentence -> bindParam(":Pass",$pass);
            $sentence -> bindParam(":Role",$role);
            $sentence -> bindParam(":Region",$region);
            $sentence -> execute();
        }
        catch(PDOException $e)
        {
            echo "Error: ".$e -> getMessage();
            echo "DATA NOT INSERTED D:";
        }
        closeConnection($connection);
        header("location: ../record.php");
    }

     function createNewStudent($user,$pass,$role,$region,$connection){
        
        $query = "INSERT INTO alumno (idAlumno,Nombre,APaterno,AMaterno,Telefono,Direccion,Correo,CURP,Estatus,idAcceso) 
                 VALUES 
                 (NULL,:Name,:Lastname1,:Lastname2,:Phone,:Address,:Email,:Curp,:Status,:Access)"; 
        try
        {
            $sentence = $connection -> prepare($query);
            $sentence -> bindParam(":Name",$user);
            $sentence -> bindParam(":Lastname1",$pass);
            $sentence -> bindParam(":Lastname2",$role);
            $sentence -> bindParam(":Phone",$region);
            $sentence -> bindParam(":Address",$region);
            $sentence -> bindParam(":Email",$region);
            $sentence -> bindParam(":Curp",$region);
            $sentence -> bindParam(":Status",$region);
            $sentence -> bindParam(":Access",$region);
            $sentence -> execute();
        }
        catch(PDOException $e)
        {
            echo "Error: ".$e -> getMessage();
            echo "DATA NOT INSERTED D:";
        }
        closeConnection($connection);
        header("location: ../record.php");
    }
?>