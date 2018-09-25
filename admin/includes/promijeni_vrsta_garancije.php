<form action="" method="post">
    <div class="form-group">
        <label for="vrsta_garancije"> Izmjena vrste garancije</label>

        <?php

            if(isset($_GET['promijeni'])){
                $sifra = $_GET['promijeni'];
                $query = "SELECT * FROM vrsta_garancije WHERE sifra = {$sifra}";
                $select_vrsta_garancije_promijeni = mysqli_query($connection, $query);

                $row = mysqli_fetch_assoc($select_vrsta_garancije_promijeni);
                    $sifra = $row['sifra'];
                    $vrsta_garancije = $row['vrsta_garancije'];
                    $trajanje_garancije = $row['trajanje_garancije'];
                    $napomena = $row['napomena'];
            }
        ?>
        <?php

            if(isset($_POST['promijeni_vrsta_garancije'])){
                $vrsta_garancije = $_POST['vrsta_garancije'];
                $trajanje_garancije = $_POST['trajanje_garancije'];
                $napomena = $_POST['napomena'];

                $query = "UPDATE vrsta_garancije SET vrsta_garancije = '{$vrsta_garancije}', trajanje_garancije = {$trajanje_garancije}, 
                          napomena = '{$napomena}' WHERE sifra = {$sifra}";
                $update_vrsta_garancije = mysqli_query($connection, $query);

                if(!$update_vrsta_garancije){
                    die("Greška unosa " . mysqli_error($connection));
                } else {
                    header("Location: vrsta_garancije.php");
                }
            }

        ?>

        <input value="<?php if(isset($vrsta_garancije)){echo $vrsta_garancije;} ?>" class="form-control" type="text" name="vrsta_garancije">
    </div>
    <div class="form-group">
        <label for="trajanje_garancije"> Trajanje garancije</label>
        <input value="<?php if(isset($trajanje_garancije)){echo $trajanje_garancije;} ?>" class="form-control" type="text" name="trajanje_garancije">
    </div>
    <div class="form-group">
        <label for="napomena"> Napomena</label>
        <input value="<?php if(isset($napomena)){echo $napomena;} ?>" class="form-control" type="text" name="napomena">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="promijeni_vrsta_garancije" value="Promijeni">
    </div>
</form>



