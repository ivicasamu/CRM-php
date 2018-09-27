<div class="table-responsive">
    <div class="col-xs-12 button_add">
<!--        <input type="submit" name="submit" class="btn btn-success" value="Apply">-->
        <a class="btn btn-primary" href="services.php?source=add_service">Dodaj servis</a>
    </div>
    <table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th class="text-center"></th>
                <th class="text-center">Vlasnik uređaja</th>
                <th class="text-center">Model</th>
                <th class="text-center">Serijski broj</th>
                <th class="text-center">Vrsta servisa</th>
                <th class="text-center">Datum servisa</th>
                <th class="text-center">Idući servis</th>
                <th class="text-center">Napomena</th>
                <th class="text-center">Akcija</th>
            </tr>
        </thead>
        <tbody>
        <?php

        $count = 0;

        $query = "SELECT * FROM service ORDER BY service_date DESC";
        $select_service = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_service)){
            $service_id = $row['service_id'];
            $service_equipment = $row['service_equipment'];
            $service_type = $row['service_type'];
            $service_date = date("d.m.Y", strtotime($row['service_date']));

            if($row['service_next'] != '0000-00-00'){
                $service_next = date("d.m.Y", strtotime($row['service_next']));
            } else {
                $service_next = " - ";
            }

            $service_note = $row['service_note'];

            $count++;

            echo "<tr>";
            echo "<td>$count</td>";

            $query = "SELECT * FROM equipment WHERE equipment_id = {$service_equipment}";
            $select_equipment_service = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select_equipment_service);
            $equipment_client = $row['equipment_client'];
            $equipment = $row['equipment'];
            $equipment_serial = $row['equipment_serial'];

            $query = "SELECT * FROM client WHERE client_id = {$equipment_client}";
            $select_client_equipment = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select_client_equipment);
            $client = $row['client'];

            echo "<td>$client</td>";
            echo "<td>$equipment</td>";
            echo "<td>$equipment_serial</td>";

            $query = "SELECT * FROM vrsta_servisa WHERE sifra = {$service_type}";
            $select_type_service = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select_type_service);
            $type = $row['vrsta_servisa'];

            echo "<td>$type</td>";
            echo "<td>$service_date</td>";
            echo "<td>$service_next</td>";
            echo "<td>$service_note</td>";
            echo "<td class=\"text-center\">
                    <a href='services.php?source=edit_service&edit_service={$service_id}'><i class=\"fa fa-fw fa-edit\"></i></a>   |    
                    <a href='services.php?delete={$service_id}'><i class=\"fa fa-fw fa-eraser\"></i></a>
                </td>";
            echo "</tr>";
        }

        ?>
        </tbody>
    </table>
</div>


<?php

if(isset($_GET['delete'])){
    $the_service_id = $_GET['delete'];

    $query = "DELETE FROM service WHERE service_id = {$the_service_id} ";
    $delete_user = mysqli_query($connection, $query);

    header("Location: services.php");
}



?>