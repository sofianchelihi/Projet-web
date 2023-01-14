<?php
    session_start();
    require '../application/app_Classes_and_Functions/init.php';
    $app = new App;
    $app->getControlleur();
