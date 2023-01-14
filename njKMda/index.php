<?php
    session_start();
    require '../application/app_Classes_and_Functions/init_admin.php';
    $app = new App_admin;
    $app->getControlleur();
