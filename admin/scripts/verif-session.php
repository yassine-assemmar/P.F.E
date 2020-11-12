<?php

session_start();

include("../inc/functions.php");

if (isset($_SESSION["login"])) {

    if (check_role($_SESSION["role"]) == "administrateur") {
        header("location:../index.php");
    }
    if (check_role($_SESSION["role"]) == "utilisateur") {
        header("location:../../index.php");
    }
}

header("location:../index.php");
