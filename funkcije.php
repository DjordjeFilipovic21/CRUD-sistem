<?php
function konekcija(){
    $db = mysqli_connect('localhost', 'root', '', 'zg');
    if(!$db){
        echo "Neuspela konekcija na bazu";
        echo mysqli_connect_error();
        return false;
    }
    else{
        mysqli_query($db, "SET NAMES utf8");
        return $db;
    }
}

?>