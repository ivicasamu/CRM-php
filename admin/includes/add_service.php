<?php

if(isset($_POST['create_service'])){
    if(isset($_POST['checkBoxArray'])){
        foreach($_POST['checkBoxArray'] as $equipmentValueId){
            $service_type = $_POST['service_type'];
            $service_date = $_POST['service_date'];
            $service_next = $_POST['service_next'];
            $service_note = $_POST['service_note'];

            $query = "INSERT INTO service (service_equipment, service_type, service_date, service_next, service_note) ";
            $query .="values ({$equipmentValueId}, {$service_type}, '{$service_date}', '{$service_next}', '{$service_note}') " ;
            $insert_service = mysqli_query($connection, $query);

            confirmQuery($insert_service);

            header('Location: services.php');

        }
    }
}
?>

<form action="" method="post">
    <div class="col-xs-12">
        <div class="form-group">
            <?php if(!isset($_POST['submit_client'])){ ?>
                <select name="client" id="client" class="custom-select custom-select-lg mb-3">
                <option selected value="">Odaberi vlasnika uređaja</option>
                <?php

                $query = "SELECT * FROM client ORDER BY client ASC";
                $select_client = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_client)){
                    $client_id = $row['client_id'];
                    $client = $row['client'];

                    echo "<option value='{$client_id}'>$client</option>";
                } ?>
            </select>
            <?php } else { ?>
                <select name="client" id="client" class="custom-select custom-select-lg mb-3">
                    <?php
                        $client_id = $_POST['client'];

                        $query = "SELECT * FROM client WHERE client_id = {$client_id}";
                        $select_selected_client = mysqli_query($connection, $query);
                        $row = mysqli_fetch_assoc($select_selected_client);
                        $client = $row['client'];
                    ?>
                <option selected value=""><?php echo $client; ?></option>
                <?php

                $query = "SELECT * FROM client ORDER BY client ASC";
                $select_client = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_client)){
                    $the_client_id = $row['client_id'];
                    $the_client = $row['client'];

                    echo "<option value='{$the_client_id}'>$the_client</option>";
                } ?>
            <?php } ?>
            <input type="submit" name="submit_client" class="btn btn-success" value="Odaberi">
        </div>
    </div>
</form>


<?php
    if(isset($_POST['submit_client'])){
        $the_client_id = $_POST['client']; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-xs-12 col-md-6 table-responsive">
                <table class="table table-bordered table-hover table-responsive">
                    <thead>
                    <tr>
                        <th><input id="selectAllBoxes" type="checkbox"></th>
                        <th class="text-center">Tip opreme</th>
                        <th class="text-center">Model opreme</th>
                        <th class="text-center">Serijski broj opreme</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php

                        $query = "SELECT * FROM equipment WHERE equipment_client = {$client_id}";
                        $select_equipment_service = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_equipment_service)){
                            $equipment_id = $row['equipment_id'];
                            $equipment_type = $row['equipment_type'];
                            $equipment_model = $row['equipment'];
                            $equipment_serial = $row['equipment_serial'];

                            $query = "SELECT * FROM vrsta_opreme WHERE sifra = {$equipment_type}";
                            $select_type_equipment = mysqli_query($connection, $query);

                            $row = mysqli_fetch_assoc($select_type_equipment);
                            $equipment_type = $row['vrsta_opreme'];

                            echo "<tr>";
                            ?>
                            <td>
                                <input class="checkBoxes" id="selectAllBoxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $equipment_id; ?>">
                            </td>
                            <?php
                            echo "<td>$equipment_type</td>";
                            echo "<td>$equipment_model</td>";
                            echo "<td>$equipment_serial</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <select name="service_type" id="service_type" class="custom-select custom-select-lg mb-3">
                        <option selected value="">Odaberi vrstu servisa</option>
                        <?php

                        $query = "SELECT * FROM vrsta_servisa ORDER BY vrsta_servisa ASC";
                        $select_service_type = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_service_type)){
                            $service_type_id = $row['sifra'];
                            $service_type = $row['vrsta_servisa'];

                            echo "<option value='{$service_type_id}'>$service_type</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-xs-6">
                    <label for="service_date">Datum servisa</label>
                    <input type="date" class="form-control" name="service_date" >
                </div>

                <div class="form-group col-xs-6">
                    <label for="service_next">Datum idućeg servisa</label>
                    <input type="date" class="form-control" name="service_next" >
                </div>

                <div class="form-group">
                    <label for="service_note">Napomena</label>
                    <textarea class="form-control" name="service_note" id="body" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="create_service" value="Dodaj servis">
                </div>

            </div>
        </form>

    <?php } ?>
