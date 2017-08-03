<?php
/**
 * Created by PhpStorm.
 * User: Velislav
 * Date: 06/06/2017
 * Time: 10:31
 */
session_start();
if(isset($_SESSION["user"]))
{
    echo '{"status":"logged"}';
} else
{
    echo '{"status":"notLogged"}';
}