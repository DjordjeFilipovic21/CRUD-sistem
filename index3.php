<?php
    require_once("funkcije.php");
    $db=konekcija();
    if(!$db)exit();
    $ime="";
    $prezime="";
    $email="";
    $lozinka="";
    $status="";
    $obrisan=0;
    $aktivan=0;
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $upit="SELECT * FROM korisnici WHERE id={$id}";
        $rez=mysqli_query($db, $upit);
        $red=mysqli_fetch_assoc($rez);
        /*$ime=$red['ime'];
        $prezime=$red['prezime'];*/
        extract($red);
        //print_r($red);
    }
    
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
    <div class="container">
        <h1>Izmenite korisnika</h1>
        <div class="row-12">
            <div class="col-12">
                <a href="index2.html">Svi korisnici</a>
            </div>
        </div>
        <hr>
        <form action="izmeniKorisnika2.php" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" id="id" name="id" value="<?= $id?>" hidden>
            </div>
            <div class="mb-3">
                <label for="ime" class="form-label">Unesite ime</label>
                <input type="text" class="form-control" id="ime" name="ime" placeholder="Unesite ime" value="<?= $ime?>">
            </div>
            <div class="mb-3">
                <label for="prezime" class="form-label">Unesite prezime</label>
                <input type="text" class="form-control" id="prezime" name="prezime" placeholder="Unesite prezime" value="<?= $prezime?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Unesite email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Unesite email" value="<?= $email?>">
            </div>
            <div class="mb-3">
                <label for="lozinka" class="form-label">Unesite lozinku</label>
                <input type="text" class="form-control" id="lozinka" name="lozinka" placeholder="Unesite lozinku" value="<?= $lozinka?>">
            </div>

            <select class="form-select" aria-label="Default select example" name="status">
                <option value="0">--Izaberite status--</option>
                <option value="Administrator" <?php echo ($status=="Administrator")?"selected":""?>>Administrator</option>
                <option value="Urednik" <?php echo ($status=="Urednik")?"selected":""?>>Urednik</option>
                <option value="Korisnik"  <?php echo ($status=="Korisnik")?"selected":""?>>Korisnik</option>
            </select><br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="aktivan" name="aktivan" <?php echo ($aktivan==1)?"checked":""?>>
                <label class="form-check-label" for="aktivan">
                    Aktivan
                </label>
            </div><br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="obrisan" name="obrisan" <?php echo ($obrisan==1)?"checked":""?>>
                <label class="form-check-label" for="obrisan">
                    Obrisan
                </label>
            </div><br>
            <button class="btn btn-primary">Snimite podatke</button>
        </form>
        <hr>
        <?php
            //Snimanje podataka u bazu
            if(isset($_POST['id']) AND $_POST['id']!=""){
                //$ime=$_POST['ime'];
                extract($_POST);
                if($ime!="" and $prezime!="" and $email!="" and $lozinka!="" and $status!="0"){
                    $upit="UPDATE korisnici SET ime='{$ime}', prezime='{$prezime}', email='{$email}', lozinka='{$lozinka}', status='{$status}' WHERE id={$id}";
                    mysqli_query($db, $upit);
                    if(mysqli_error($db)){
                        echo "<div class='alert alert-danger'>Došlo je do greške!!!!<br>[".mysqli_errno($db)."]: ".mysqli_error($db)."</div>";
                    }
                    else{
                        //$id=mysqli_insert_id($db);
                        if(isset($_POST['aktivan'])) $upit="UPDATE korisnici set aktivan=1 WHERE id={$id}";
                        else $upit="UPDATE korisnici set aktivan=0 WHERE id={$id}";
						mysqli_query($db, $upit);
                        if(isset($_POST['obrisan'])) $upit="UPDATE korisnici set obrisan=1 WHERE id={$id}";
                        else $upit="UPDATE korisnici set obrisan=0 WHERE id={$id}";
                        mysqli_query($db, $upit);
                        echo "<div class='alert alert-success'>Uspešno izmenjen korisnik!!!!</div>";
                    }
                        

                }else
                    echo "<div class='alert alert-danger'>Svi podaci su obavezni!!!!</div>";
            }
        ?>

    </div>
</body>
</html>