<?php
    /*User: Edgar Medina Camarena
    * Date 16/06/17
    * This file helps with the operations of the database
    */
    include 'connection.php';

    function getLastAccess(){
        
        $query = "SELECT * FROM acceso ORDER BY idAcceso DESC LIMIT 1";
        $connection = openConnection();
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
        closeConnection($connection);
        return $idAcceso;
    }

?>