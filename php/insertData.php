<?php
    include 'connection.php';
    
    if(isset($_POST['access']))
    {
        $connection = openConnetcion();
    }


    function creatNewAccess($user,$pass,$role,$region,$connection){
        
        $query = "INSERT INTO acceso ('Username','Password','Rol','Region') VALUES (:User,:Pass,:Role,:Region)";
        
        try
        {
            $sentence
        }
        catch(PDOException $e)
        {
            echo "Error: ".$e ->getMessage();
            echo "DATA NOT INSERTED D:";
        }
    }
?>