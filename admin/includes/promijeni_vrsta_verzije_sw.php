<form action="" method="post">
    <div class="form-group">
        <label for="vrsta_verzije"> Izmijena vrste verzije SW/FW</label>

        <?php

            if(isset($_GET['promijeni'])){
                $sifra = $_GET['promijeni'];
                $query = "SELECT * FROM vrsta_verzije WHERE sifra = {$sifra}";
                $select_vrsta_verzije_promijeni = mysqli_query($connection, $query);

                $row = mysqli_fetch_assoc($select_vrsta_verzije_promijeni);
                    $sifra = $row['sifra'];
                    $vrsta_verzije = $row['vrsta_verzije'];
                    $napomena = $row['napomena'];
            }
        ?>
        <?php

            if(isset($_POST['promijeni_vrsta_verzije'])){
                $vrsta_verzije = $_POST['vrsta_verzije'];
                $napomena = $_POST['napomena'];

                $query = "UPDATE vrsta_verzije SET vrsta_verzije = '{$vrsta_verzije}', napomena = '{$napomena}' WHERE sifra = {$sifra}";
                $update_vrsta_verzije = mysqli_query($connection, $query);

                if(!$update_vrsta_verzije){
                    die("Greška unosa " . mysqli_error($connection));
                } else {
                    header("Location: vrsta_verzije_sw.php");
                }
            }

        ?>

        <input value="<?php if(isset($vrsta_verzije)){echo $vrsta_verzije;} ?>" class="form-control" type="text" name="vrsta_verzije">
    </div>
    <div class="form-group">
        <label for="napomena"> Napomena</label>
        <input value="<?php if(isset($napomena)){echo $napomena;} ?>" class="form-control" type="text" name="napomena">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="promijeni_vrsta_verzije" value="Promijeni">
    </div>
</form>
