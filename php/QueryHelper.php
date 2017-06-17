<?php
    /*User: Edgar Medina Camarena
    * Date 16/06/17
    * This file helps with the operations of the database
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

?>