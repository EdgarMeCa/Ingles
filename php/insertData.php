<?php
    /*
    * User: Edgar Medina Camarena
    * Date 16/06/17
    * These functions insert the data into the database.
    * Any function that insert data into the database must be here.
    */
    include 'connection.php';
    session_start();

    //Open the connection to the database
    $connection = openConnection();
    
    //Insert for Access
    if(isset($_POST['access']))
    {
        createNewAccess($_POST['user'],$_POST['pass'],$_POST['role'],$connection);
    }
    //Insert for Student
    if(isset($_POST['student']))
    {                                                       createNewStudent($_POST['nameStu'],$_POST['flastStu'],$_POST['mlastStu'],$_POST['phoneStu'],$_POST['addressStu'],$_POST['emailStu'],$_POST['curplStu'],$_POST['date'],$connection);
    }
    //Insert for Teacher
    if(isset($_POST['teacher']))
    {                 createNewTeacher($_POST['nameTea'],$_POST['flastTea'],$_POST['mlastTea'],$_POST['phoneTea'],$_POST['addressTea'],$_POST['emailTea'],$_POST['curplTea'],$_POST['date'],$connection);
    }

    function createNewAccess($user,$pass,$role,$connection){
        
        $query = "INSERT INTO acceso (idAcceso,Username,Password,Rol,Region) VALUES (NULL,:User,:Pass,:Role,:Region)";
 
        if(accessExist($connection,$user))
        {
            header("location: ../error.php");
        }
        
        try
        {
            $sentence = $connection -> prepare($query);
            $sentence -> bindParam(":User",$user);
            $sentence -> bindParam(":Pass",$pass);
            $sentence -> bindParam(":Role",$role);
            $sentence -> bindParam(":Region",$_SESSION['region']);
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
        
        $query = "INSERT INTO alumno                    
        (idAlumno,Nombre,APaterno,AMaterno,Telefono,Direccion,Correo,CURP,Estatus,FechaIngreso,FechaSalida,idAcceso) 
        VALUES 
        ('',:Name,:Lastname1,:Lastname2,:Phone,:Address,:Email,:Curp,:Status,:Date,NULL,:Access)";
        $idAccess = getLastAccess($connection);
        $status = "ACTIVE";
        $date = formatDate($date);
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
            $sentence -> bindParam(":Status",$status);
            $sentence -> bindParam(":Date",$date);
            $sentence -> bindParam(":Access",$idAccess);
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

    function createNewTeacher($name,$lastname1,$lastname2,$phone,$address,$email,$curp,$date,$connection){
        
        $query = "INSERT INTO profesor                    (idProfesor,Nombre,APaterno,AMaterno,Telefono,Direccion,Correo,CURP,Estatus,FechaIngreso,FechaSalida,idAcceso) 
        VALUES 
        ('',:Name,:Lastname1,:Lastname2,:Phone,:Address,:Email,:Curp,:Status,:Date,NULL,:Access)";
        $idAccess = getLastAccess($connection);
        $status = "ACTIVE";
        $date = formatDate($date);
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
            $sentence -> bindParam(":Status",$status);
            $sentence -> bindParam(":Date",$date);
            $sentence -> bindParam(":Access",$idAccess);
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

    /*
    * These functios helps with the insertion of data
    */

    function getLastAccess($connection){
        
        $query = "SELECT * FROM acceso ORDER BY idAcceso DESC LIMIT 1";
        $idAccess = "";
        try
        {
            $sentence = $connection -> prepare($query);
            $sentence -> execute();
            $result = $sentence -> fetchAll();
            
            foreach($result as $row)
            {
                $idAcceso = $row['idAcceso'];
            }
        }
        catch(PDOException $e)
        {
            echo "Error: ".$e -> getMessage();
            echo "<br>Something happend D:";
        }
        return $idAcceso;
    }
                                   
    function formatDate($date) {
        $day = substr($date,0,2);
        $month = substr($date,3,2);
        $year = substr($date,6,4);
        return $year . "-" . $month . "-" . $day;
    }
    
    function accessExist($connection,$user){
        $query = "SELECT * FROM acceso WHERE Username = :user";
        
        $sentence = $connection -> prepare($query);
        $sentence -> bindParam(":user",$user);
        $sentence -> execute();
        $result = $sentence -> fetchAll();
        
        return queryHaveResult($result);
    }

    function queryHaveResult($result){
        $haveOne = 0;
        foreach($result as $row)
        {
            $haveOne = 1 + $haveOne;
        }
        return ($haveOne > 0) ? true : false;
    }
    
    
?>