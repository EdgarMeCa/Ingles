
<?php
/*User: Edgar Medina Camarena
 *Date 13/05/17
 *Time 13:53 PM
 * This file open and close the connection to database
 */
    
    function openConnection(){
        include 'data.php';
        $dbConnection = null;
        try 
        {
            $dbConnection = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword); 
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) 
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $dbConnection;
    }

    function closeConnection($connection){
        $connection = null;
    }

?>

