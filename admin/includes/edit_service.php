<?php

if(isset($_GET['edit_service'])){
    $the_service_id = $_GET['edit_service'];

    $query = "SELECT * FROM service WHERE service_id = $the_service_id";
    $select_edit_service_query = mysqli_query($connection, $query);

    confirmQuery($select_edit_service_query);

    while($row = mysqli_fetch_assoc($select_edit_service_query)){
        $service_equipment = $row['service_equipment'];
        $service_type = $row['service_type'];
        $service_date = $row['service_date'];
        $service_next = $row['service_next'];
        $service_note = $row['service_note'];
    }
}

if(isset($_POST['edit_service'])){
    $service_type = $_POST['service_type'];
    $service_date = $_POST['service_date'];
    $service_next = $_POST['service_next'];
    $service_note = $_POST['service_note'];

    $query = "UPDATE service SET ";
    $query .= "service_type = {$service_type}, ";
    $query .= "service_date = '{$service_date}', ";
    $query .= "service_next = '{$service_next}', ";
    $query .= "service_note = '{$service_note}' ";
    $query .= "WHERE service_id = {$the_service_id} ";

    $edit_service_query = mysqli_query($connection, $query);

    confirmQuery($edit_service_query);

    header('Location: services.php');

}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <?php

            $query = "SELECT * FROM equipment WHERE equipment_id = {$service_equipment}";
            $select_equipment_edit_service = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select_equipment_edit_service);
            $service_equipment = $row['equipment'];
            $service_equipment_type =  $row['equipment_serial'];
            $service_client_id = $row['equipment_client'];

            $query = "SELECT * FROM client WHERE client_id = {$service_client_id}";
            $service_equipment_client = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($service_equipment_client);
            $service_client = $row['client'];

        ?>
        <legend><?php echo $service_client. " - " . $service_equipment . ", sn: " . $service_equipment_type; ?></legend>
    </div>

    <div class="form-group">
        <label for="service_type"> Vrsta servisa</label>
        <select name="service_type" id="service_type" class="custom-select custom-select-lg mb-3">
            <?php
            $query = "SELECT * FROM vrsta_servisa WHERE sifra = {$service_type} ";
            $select_service_type_query = mysqli_query($connection, $query);

            $row = mysqli_fetch_assoc($select_service_type_query);
            ?>
            <option selected value="<?php echo $row['sifra']; ?>"><?php echo $row['vrsta_servisa']; ?></option>
            <?php

            $query = "SELECT * FROM vrsta_servisa WHERE vrsta_servisa != '{$row['vrsta_servisa']}' ORDER BY vrsta_servisa DESC";
            $select_service_type = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_service_type)){
                $service_type_id = $row['sifra'];
                $service_type = $row['vrsta_servisa'];

                echo "<option value='{$service_type_id}'>$service_type</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="service_date">Datum servisa</label>
        <input type="date" class="form-control" name="service_date" value="<?php echo $service_date; ?>" >
    </div>

    <div class="form-group">
        <label for="service_next">Datum idućeg servisa</label>
        <input type="date" class="form-control" name="service_next" value="<?php echo $service_next; ?>" >
    </div>

    <div class="form-group">
        <label for="service_note">Napomena</label>
        <textarea class="form-control" name="service_note" id="body" cols="30" rows="10"><?php echo $service_note; ?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_service" value="Izmjeni podatke">
    </div>

</form>