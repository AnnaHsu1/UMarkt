<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if ($_SESSION["admin"] != "TRUE") {
       header("Location: /Front%20Store/php/home.php");
    }

?>