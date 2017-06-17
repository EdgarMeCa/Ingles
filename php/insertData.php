<?php
    /*
    * User: Edgar Medina Camarena
    * Date 16/06/17
    * These function insert the data into database.
    * Any function that inserts data must be here.
    */
    include 'connection.php';
    include 'QueryHelper.php';

    if(isset($_POST['access']))
    {
        $connection = openConnection();
        createNewAccess($_POST['user'],$_POST['pass'],$_POST['role'],$_POST['region'],$connection);
    }

     if(isset($_POST['student']))
    {
        $connection = openConnection();
        createNewStudent($_POST['nameStu'],$_POST['flastStu'],$_POST['mlastStu'],$_POST['phoneStu'],$_POST['addressStu'],$_POST['emailStu'],$_POST['curplStu'],$_POST['date'],$connection);
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

     function createNewStudent($name,$lastname1,$lastname2,$phone,$address,$email,$curp,$date,$connection){
        
        $query = "INSERT INTO alumno (idAlumno,Nombre,APaterno,AMaterno,Telefono,Direccion,Correo,CURP,Estatus,idAcceso) 
                 VALUES 
                 (NULL,:Name,:Lastname1,:Lastname2,:Phone,:Address,:Email,:Curp,:Status,:Date,NULL,:Access)";
        $idAccess = getLastAccess();
        try
        {
            $sentence = $connection -> prepare($query);
            $sentence -> bindParam(":Name",$name);
            $sentence -> bindParam(":Lastname1",$lastname1);
            $sentence -> bindParam(":Lastname2",$lastname2);
            $sentence -> bindParam(":Phone",$phone);
            $sentence -> bindParam(":Address",$address);
            $sentence -> bindParam(":Email",$email);
            $sentence -> bindParam(":Curp",$curp);
            $sentence -> bindParam(":Status","ACTIVE");
            $sentence -> bindParam(":Date",$date);
            $sentence -> bindParam(":Access",$access);
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