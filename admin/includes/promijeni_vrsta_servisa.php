<form action="" method="post">
    <div class="form-group">
        <label for="vrsta_servisa"> Izmjena vrste servisa</label>

        <?php

            if(isset($_GET['promijeni'])){
                $sifra = $_GET['promijeni'];
                $query = "SELECT * FROM vrsta_servisa WHERE sifra = {$sifra}";
                $select_vrsta_servisa_promijeni = mysqli_query($connection, $query);

                $row = mysqli_fetch_assoc($select_vrsta_servisa_promijeni);
                    $sifra = $row['sifra'];
                    $vrsta_servisa = $row['vrsta_servisa'];
                    $napomena = $row['napomena'];
            }
        ?>
        <?php

            if(isset($_POST['promijeni_vrsta_servisa'])){
                $vrsta_servisa = $_POST['vrsta_servisa'];
                $napomena = $_POST['napomena'];

                $query = "UPDATE vrsta_servisa SET vrsta_servisa = '{$vrsta_servisa}', napomena = '{$napomena}' WHERE sifra = {$sifra}";
                $update_vrsta_servisa = mysqli_query($connection, $query);

                if(!$update_vrsta_servisa){
                    die("Greška unosa " . mysqli_error($connection));
                } else {
                    header("Location: vrsta_servisa.php");
                }
            }

        ?>

        <input value="<?php if(isset($vrsta_servisa)){echo $vrsta_servisa;} ?>" class="form-control" type="text" name="vrsta_servisa">
    </div>
    <div class="form-group">
        <label for="napomena"> Napomena</label>
        <input value="<?php if(isset($napomena)){echo $napomena;} ?>" class="form-control" type="text" name="napomena">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="promijeni_vrsta_servisa" value="Promijeni">
    </div>
</form>
