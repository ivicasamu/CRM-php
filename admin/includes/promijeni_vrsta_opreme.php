<form action="" method="post">
    <div class="form-group">
        <label for="vrsta_opreme"> Izmjena vrste opreme</label>

        <?php

            if(isset($_GET['promijeni'])){
                $sifra = $_GET['promijeni'];
                $query = "SELECT * FROM vrsta_opreme WHERE sifra = {$sifra}";
                $select_vrsta_opreme_promijeni = mysqli_query($connection, $query);

                $row = mysqli_fetch_assoc($select_vrsta_opreme_promijeni);
                    $sifra = $row['sifra'];
                    $vrsta_opreme = $row['vrsta_opreme'];
                    $napomena = $row['napomena'];
            }
        ?>
        <?php

            if(isset($_POST['promijeni_vrsta_opreme'])){
                $vrsta_opreme = $_POST['vrsta_opreme'];
                $napomena = $_POST['napomena'];

                $query = "UPDATE vrsta_opreme SET vrsta_opreme = '{$vrsta_opreme}', napomena = '{$napomena}' WHERE sifra = {$sifra}";
                $update_vrsta_opreme = mysqli_query($connection, $query);

                if(!$update_vrsta_opreme){
                    die("Greška unosa " . mysqli_error($connection));
                } else {
                    header("Location: vrsta_opreme.php");
                }
            }

        ?>

        <input value="<?php if(isset($vrsta_opreme)){echo $vrsta_opreme;} ?>" class="form-control" type="text" name="vrsta_opreme">
    </div>
    <div class="form-group">
        <label for="napomena"> Napomena</label>
        <input value="<?php if(isset($napomena)){echo $napomena;} ?>" class="form-control" type="text" name="napomena">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="promijeni_vrsta_opreme" value="Promijeni">
    </div>
</form>
