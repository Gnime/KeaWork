<?php
/**
 * Created by PhpStorm.
 * User: Velislav
 * Date: 06/06/2017
 * Time: 12:48
 */
session_start();
unset($_SESSION["user"]);
session_destroy();
header("Location: ../index.php");