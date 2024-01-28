<?php
    require_once("funkcije.php");
    $db = konekcija();
    if(!$db)exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>Brisanje korisnika</h1>
    <a href="index.html">Korisnici</a>
    
</body>
</html>
<?php
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    $upit="DELETE FROM korisnici WHERE id='{$id}'";
    mysqli_query($db, $upit);
    if(mysqli_error($db))
        echo "<div class='alert alert-danger'>Doslo je do greske!!!!</div>";
    else
        echo "<div class='alert alert-success'>Uspesno izbrisan korisnik!!</div>";
    }

?>