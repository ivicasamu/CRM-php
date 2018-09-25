<?php

if(isset($_POST['create_equipment'])){
    $equipment_active = $_POST['equipment_active'];
    $equipment_client = $_POST['equipment_client'];
    $equipment_type = $_POST['equipment_type'];
    $equipment = $_POST['equipment'];
    $equipment_serial = $_POST['equipment_serial'];
    $equipment_ip = $_POST['equipment_ip'];
    $equipment_artical = $_POST['equipment_artical'];
    $quipment_key_num = $_POST['equipment_key_num'];

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


    $query = "INSERT INTO equipment(equipment_active, equipment_client, equipment_type, equipment, equipment_serial, ";
    $query .= "equipment_ip, equipment_artical, equipment_key_num, equipment_purchase, equipment_warranty, equipment_warranty_exp, equipment_note) ";
    $query .= "VALUES('{$equipment_active}', {$equipment_client}, {$equipment_type}, '{$equipment}', '{$equipment_serial}', ";
    $query .= "'{$equipment_ip}', '{$equipment_artical}', '{$quipment_key_num}', '{$equipment_purchase}', '{$equipment_warranty}', '{$equipment_warranty_exp}', '{$equipment_note}' ) ";

    $create_equipment_query = mysqli_query($connection, $query);

    confirmQuery($create_equipment_query);

    header('Location: equipments.php');

}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="equipment_active">Status uređaja</label>
        <select name="equipment_active" id="equipment_active" class="custom-select custom-select-lg mb-3">
            <option selected value="Da">Odaberi status uređaja</option>
            <option value="Da">Aktivan</option>
            <option value="Ne">Neaktivan</option>
        </select>
    </div>


    <div class="form-group">
        <label for="equipment_client"> Vlasnik opreme</label>
        <select name="equipment_client" id="equipment_client" class="custom-select custom-select-lg mb-3">
            <option selected value="">Odaberi vlasnika opreme</option>
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
            <option selected value="">Odaberi vrstu uređaja</option>
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
        <input type="text" class="form-control" name="equipment" >
    </div>

    <div class="form-group">
        <label for="equipment_serial">Serijski broj</label>
        <input type="text" class="form-control" name="equipment_equipment" >
    </div>

    <div class="form-group">
        <label for="equipment_ip">IP adresa</label>
        <input type="text" class="form-control" name="equipment_ip" >
    </div>

    <div class="form-group">
        <label for="equipment_artical">Artical number</label>
        <input type="text" class="form-control" name="equipment_artical" >
    </div>

    <div class="form-group">
        <label for="equipment_key_num">KDM broj</label>
        <input type="text" class="form-control" name="equipment_key_num" >
    </div>

    <div class="form-group">
        <label for="equipment_purchase">Datum kupnje</label>
        <input type="date" class="form-control" name="equipment_purchase" >
    </div>

    <div class="form-group">
        <label for="equipment_warranty"> Vrsta garancije</label>
        <select name="equipment_warranty" id="equipment_warranty" class="custom-select custom-select-lg mb-3">
            <option selected value="">Odaberi vrstu garancije</option>
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
        <input type="date" class="form-control" name="equipment_warranty_exp" >
    </div>

    <div class="form-group">
        <label for="equipment_note">Napomena</label>
        <textarea class="form-control" name="equipment_note" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_equipment" value="Dodaj opremu">
    </div>

</form>