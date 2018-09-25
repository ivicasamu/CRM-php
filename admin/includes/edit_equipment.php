<?php

if(isset($_GET['edit_equipment'])){
    $the_equipment_id = $_GET['edit_equipment'];

    $query = "SELECT * FROM equipment WHERE equipment_id = $the_equipment_id";
    $select_edit_equipment_query = mysqli_query($connection, $query);

    confirmQuery($select_edit_equipment_query);

    while($row = mysqli_fetch_assoc($select_edit_equipment_query)){
        $equipment_active = $row['equipment_active'];
        $equipment_client = $row['equipment_client'];
        $equipment_type = $row['equipment_type'];
        $equipment = $row['equipment'];
        $equipment_serial = $row['equipment_serial'];
        $equipment_ip = $row['equipment_ip'];
        $equipment_artical = $row['equipment_artical'];
        $equipment_key_num = $row['equipment_key_num'];
        $equipment_purchase = $row['equipment_purchase'];
        $equipment_warranty = $row['equipment_warranty'];
        $equipment_warranty_exp = $row['equipment_warranty_exp'];
        $equipment_note = $row['equipment_note'];
    }
}

if(isset($_POST['edit_equipment'])){
    $equipment_active = $_POST['equipment_active'];
    $equipment_client = $_POST['equipment_client'];
    $equipment_type = $_POST['equipment_type'];
    $equipment = $_POST['equipment'];
    $equipment_serial = $_POST['equipment_serial'];
    $equipment_ip = $_POST['equipment_ip'];
    $equipment_artical = $_POST['equipment_artical'];
    $equipment_key_num = $_POST['equipment_key_num'];

    if($_POST['equipment_purchase'] !== NULL){
        $equipment_purchase = $_POST['equipment_purchase'];
    } else {
        $equipment_purchase = NULL;
    }

    $equipment_warranty = $_POST['equipment_warranty'];

    if($_POST['equipment_warranty_exp'] !== NULL){
        $equipment_warranty_exp = $_POST['equipment_warranty_exp'];
    } else {
        $equipment_warranty_exp = NULL;
    }

    $equipment_note = $_POST['equipment_note'];

    $query = "UPDATE equipment SET ";
    $query .= "equipment_active = '{$equipment_active}', ";
    $query .= "equipment_client = {$equipment_client}, ";
    $query .= "equipment_type = {$equipment_type}, ";
    $query .= "equipment = '{$equipment}', ";
    $query .= "equipment_serial = '{$equipment_serial}', ";
    $query .= "equipment_ip = '{$equipment_ip}', ";
    $query .= "equipment_artical = '{$equipment_artical}', ";
    $query .= "equipment_key_num = '{$equipment_key_num}', ";
    $query .= "equipment_purchase = '{$equipment_purchase}', ";
    $query .= "equipment_warranty = '{$equipment_warranty}', ";
    $query .= "equipment_warranty_exp = '{$equipment_warranty_exp}', ";
    $query .= "equipment_note = '{$equipment_note}' ";
    $query .= "WHERE equipment_id = {$the_equipment_id} ";

    $edit_equipment_query = mysqli_query($connection, $query);

    confirmQuery($edit_equipment_query);

    header('Location: equipments.php');

}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="equipment_active">Status uređaja</label>
        <select name="equipment_active" id="equipment_active" class="custom-select custom-select-lg mb-3">
            <option selected value="<?php echo $equipment_active; ?>">
                <?php
                    if($equipment_active == 'Da'){
                        echo "Aktivan";
                    } else {
                        echo "Neaktivan";
                    }
                ?>
            </option>
            <?php
                if($equipment_active == 'Da'){
                    echo "<option value='Ne'>Neaktivan</option>";
                } else {
                    echo "<option value='Da'>Aktivan</option>";
                }
            ?>
        </select>
    </div>


    <div class="form-group">
        <label for="equipment_client"> Vlasnik opreme</label>
        <select name="equipment_client" id="equipment_client" class="custom-select custom-select-lg mb-3">
            <?php
                $query = "SELECT * FROM client WHERE client_id = {$equipment_client} ";
                $select_equipment_client_query = mysqli_query($connection, $query);

                $row = mysqli_fetch_assoc($select_equipment_client_query);
            ?>
            <option selected value="<?php echo $row['client_id']; ?>"><?php echo $row['client']; ?></option>
            <?php

            $query = "SELECT * FROM client ORDER BY client ASC";
            $select_client = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_client)){
                $client_id = $row['client_id'];
                $client = $row['client'];

                echo "<option value='{$client_id}'>$client</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="equipment_type"> Vrsta uređaja</label>
        <select name="equipment_type" id="equipment_type" class="custom-select custom-select-lg mb-3">

            <?php
                $query = "SELECT * FROM vrsta_opreme WHERE sifra = {$equipment_type} ";
                $select_equipment_type_query = mysqli_query($connection, $query);

                $row = mysqli_fetch_assoc($select_equipment_type_query);
            ?>
            <option selected value="<?php echo $row['sifra']; ?>"><?php echo $row['vrsta_opreme']; ?></option>
            <?php

            $query = "SELECT * FROM vrsta_opreme ORDER BY vrsta_opreme ASC";
            $select_type = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_type)){
                $type_id = $row['sifra'];
                $type = $row['vrsta_opreme'];

                echo "<option value='{$type_id}'>$type</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="equipment">Model</label>
        <input type="text" class="form-control" name="equipment" value="<?php echo $equipment; ?>" >
    </div>

    <div class="form-group">
        <label for="equipment_serial">Serijski broj</label>
        <input type="text" class="form-control" name="equipment_serial" value="<?php echo $equipment_serial; ?>" >
    </div>

    <div class="form-group">
        <label for="equipment_ip">IP adresa</label>
        <input type="text" class="form-control" name="equipment_ip" value="<?php echo $equipment_ip; ?>" >
    </div>

    <div class="form-group">
        <label for="equipment_artical">Artical number</label>
        <input type="text" class="form-control" name="equipment_artical" value="<?php echo $equipment_artical; ?>" >
    </div>

    <div class="form-group">
        <label for="equipment_key_num">KDM broj</label>
        <input type="text" class="form-control" name="equipment_key_num" value="<?php echo $equipment_key_num; ?>" >
    </div>

    <div class="form-group">
        <label for="equipment_purchase">Datum kupnje</label>
        <input type="date" class="form-control" name="equipment_purchase" value="<?php echo $equipment_purchase; ?>" >
    </div>

    <div class="form-group">
        <label for="equipment_warranty"> Vrsta garancije</label>
        <select name="equipment_warranty" id="equipment_warranty" class="custom-select custom-select-lg mb-3">
            <?php
                $query = "SELECT * FROM vrsta_garancije WHERE sifra = {$equipment_warranty} ";
                $select_equipment_warranty_query = mysqli_query($connection, $query);

                $row = mysqli_fetch_assoc($select_equipment_warranty_query);
            ?>
            <option selected value="<?php echo $row['sifra']; ?>"><?php echo $row['vrsta_garancije']; ?></option>
            <?php

            $query = "SELECT * FROM vrsta_garancije ORDER BY trajanje_garancije ASC";
            $select_warranty = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_warranty)){
                $warranty_id = $row['sifra'];
                $warranty = $row['vrsta_garancije'];

                echo "<option value='{$warranty_id}'>$warranty</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="equipment_warranty_exp">Datum isteka garancije</label>
        <input type="date" class="form-control" name="equipment_warranty_exp" value="<?php echo $equipment_warranty_exp; ?>" >
    </div>

    <div class="form-group">
        <label for="equipment_note">Napomena</label>
        <textarea class="form-control" name="equipment_note" id="" cols="30" rows="10"><?php echo $equipment_note; ?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_equipment" value="Izmjeni podatke">
    </div>

</form>