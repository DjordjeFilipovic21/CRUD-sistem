<?php
    $db = mysqli_connect('localhost', 'root', '', 'zg');
    mysqli_query($db, "SET NAMES utf8");
    $upit = "SELECT * FROM korisnici";
    $rez = mysqli_query($db, $upit);
    $svi = mysqli_fetch_all($rez, MYSQLI_ASSOC);
    echo JSON_encode($svi, 256);
?>