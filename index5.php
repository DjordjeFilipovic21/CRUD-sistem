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
    <style>
   
    </style>
    
</head>
<body>
    <h1>Unesite korisnika</h1>
    <a href="index.html">Povratak</a>
    <hr>
    <form action="dodajKorisnika.php" method="post">
        <div class="mb-3">
        <label for="ime" class="form-label">Ime</label>
        <input type="text" class="form-control" id="ime" name="ime" placeholder="ime">
        </div>
        <div class="mb-3">
        <label for="prezime" class="form-label">Prezime</label>
        <input type="text" class="form-control" id="prezime" name="prezime" placeholder="prezime">
        </div>
        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="email">
        </div>
        <div class="mb-3">
        <label for="lozinka" class="form-label">Lozinka</label>
        <input type="text" class="form-control" id="lozinka" name="lozinka" placeholder="lozinka">
        </div>
        <select  class="form-select" aria-label="Default select example" name="status">
            <option value="0" selected>Izaberi status</option>
            <option value="administrator">Administrator</option>
            <option value="korisnik">Korisnik</option>
            <option value="urednik">Urednik</option>
        </select>
        <hr>
        <button class="btn btn-primary">Snimite podatke</button>
    </form>
    <hr>
    <?php
    if(isset($_POST['ime']))
    {
        extract($_POST);
        if($ime!="" and $prezime!="" and $email!="" and $lozinka!="" and $status!="0"){
        $upit = "INSERT INTO korisnici (ime, prezime, email, lozinka, status) VALUES ('{$ime}', '{$prezime}', '{$email}', '{$lozinka}', '{$status}')";
        mysqli_query($db, $upit);
            if(mysqli_error($db)){
                echo "<div class='alert alert-danger'>Doslo je do greske!!!</div>";
            }
            else{
                echo "<div class='alert alert-success'>Uspesno dodat korisnik!</div>";
            }
        }
        else{
            echo "<div class='alert alert-danger'>Svi podaci su obavezni!!!!</div>";
        }
    }

    ?>
        
   
    
</body>
</html>