<?php

    define("CLIENT_ID", "AbaicJZLFJBWTkfVM_qEuHXbNbP8q5JNuyxsN-OKTmEzHIfQJJFwq44Hhpy3H7iUvsLB4FLvb1A3Alnw");
    define("CURRENCY", "MXN");
    define("KEY_TOKEN", "APR.wqc-354*");
    define("MONEDA", "S/. ");

    session_start();

    $num_cart = 0;
    if(isset($_SESSION['carrito']['producto'])){
        $num_cart = count($_SESSION['carrito']['producto']);
    }

?>