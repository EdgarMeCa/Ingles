<?php
     /*
    *User: Edgar Medina Camarena
    *Date 17/05/17
    *Time 12:32 PM
    * This file destroy the current session 
    */
    session_start();
    session_destroy();
    header("location: ../index.html");
?>