<?php
    /*
    *User: Edgar Medina Camarena
    *Date 13/05/17
    * This algorithm is used for login the user 
    */
    include 'connection.php';
    session_start();
    if(isset($_POST['username']) and isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        //Guardamos la conexion
        $connection = openConnection();
        
        if($connection != null)
        {   
            loginUser($username, $password, $connection);
        }
        else
        {
            //Database error
            echo "Somthing happend whit the connection";
        }
    }
    else
    {
        //Error page login
        echo "error en variables";
    }
    
    /**
      * Login the user if the credentials are valid
    **/
    function loginUser($user, $pass, $conn){
        
        $queryAcceso = "SELECT * FROM acceso WHERE Username = :user AND Password = :pass";
        $idAcceso = 0;
        $rol = "";
        
        try
        {
            $sql = $conn->prepare($queryAcceso);
            $sql->bindParam(':pass',$pass);
            $sql->bindParam(':user',$user);
            $sql->execute();
            $result = $sql->fetchAll();
            
            if(queryHaveResult($result))
            {
                foreach($result as $row)
                {
                    $idAcceso = $row['idAcceso'];
                    $rol = $row['Rol'];
                }
                createCredentials4User($idAcceso,$rol,$conn);
                
                closeConnection($conn);
                
                header("location: ../superpage.php");
            }
            else
            {   
                //header("location: ../index.html");
                echo "no conto bien";
            }
            
            
            
        }
        catch(Exception $e)
        {
            echo 'Query failed: '. $e->getMessage();
        }
    }

    function createCredentials4User($idAcceso, $rol, $conn){
        $user = ""; $name = "";
        
        if(strcmp($rol,"STUDENT") == 0)
        {
            $dataUser = query4Student($idAcceso,$conn);
            foreach($dataUser as $row)
            {
                $user = $row['idAlumno'];
                $name = $row['Nombre']." ".$row['APaterno']." ".$row['AMaterno'];
            }
            $_SESSION['user'] = $user;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = $rol;
        }
        if(strcmp($rol,"TEACHER") == 0 or strcmp($rol,"ADMIN") == 0 or strcmp($rol,"SUPERADMIN") == 0)
        {
            $dataUser = query4Teacher($idAcceso,$conn); 
            foreach($dataUser as $row)
            {
                $user = $row['idProferos'];
                $name = $row['Nombre']." ".$row['APaterno']." ".$row['AMaterno'];
            }
            $_SESSION['user'] = $row['idProfesor'];
            $_SESSION['name'] = $row['Nombre']." ".$row['APaterno']." ".$row['AMaterno'];
            $_SESSION['role'] = $rol;
        }
    }

    function query4Teacher($idAcceso,$conn){
        $query = "SELECT * FROM profesor WHERE idAcceso = :id";
        
        try
        {
            $sql = $conn->prepare($query);
            $sql->bindParam(':id',$idAcceso);
            $sql->execute();
            $result = $sql->fetchAll();   
        }
        catch(Exception $e)
        {
            echo 'Query failed: '. $e->getMessage();
        }
        return $result;
    }
    
    function query4Student($idAcceso,$conn){
        $query = "SELECT * FROM alumno WHERE idAcceso = :id";
        
        try
        {
            $sql = $conn->prepare($query);
            $sql->bindParam(':id',$idAcceso);
            $sql->execute();
            $result = $sql->fetchAll();   
        }
        catch(Exception $e)
        {
            echo 'Query failed: '. $e->getMessage();
        }
        return $result;
    }
    
    /**
     *  Check if the query has results
     */
    function queryHaveResult($result){
       $haveOne = 0;
        foreach($result as $row)
        {
            $haveOne = 1 + $haveOne;
        }
        return ($haveOne == 1) ? true : false;
    }
?>