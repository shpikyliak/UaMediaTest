<?php

include 'classes/Database.php';

if (isset($_POST['short_url']))
{
    $connect = new Database();
    $url = $connect->addClick($_POST['short_url']);
    echo $url;
}

