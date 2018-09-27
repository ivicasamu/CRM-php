<div class="table-responsive">
    <table class="table table-bordered table-hover table-responsive">
        <thead>
        <tr>
            <th class="text-center"></th>
            <th class="text-center">Status uređaja</th>
            <th class="text-center">Klijent</th>
            <th class="text-center">Vrsta</th>
            <th class="text-center">Model</th>
            <th class="text-center">Serijski broj</th>
            <th class="text-center">Istek garancije</th>
            <th class="text-center">Napomena</th>
            <th class="text-center">Promjena statusa uređaja</th>
            <th class="text-center">Akcija</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $count = 0;

        $query = "SELECT * FROM equipment ORDER BY equipment_client ASC";
        $select_equipments = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_equipments)){
            $equipment_id = $row['equipment_id'];
            $equipment_active = $row['equipment_active'];
            $equipment_client = $row['equipment_client'];
            $equipment_type = $row['equipment_type'];
            $equipment = $row['equipment'];
            $equipment_serial = $row['equipment_serial'];
            if($row['equipment_warranty_exp'] != '0000-00-00'){
                $equipment_warranty_exp = date("d.m.Y", strtotime($row['equipment_warranty_exp']));
            } else {
                $equipment_warranty_exp = "Nema garancije";
            }

            $equipment_note = $row['equipment_note'];

            $count++;

            echo "<tr>";
            echo "<td>$count</td>";
            echo "<td>$equipment_active</td>";

            $query = "SELECT * FROM client WHERE client_id = {$equipment_client}";
            $select_client_equipment = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select_client_equipment);
            $client = $row['client'];

            echo "<td>$client</td>";

            $query = "SELECT * FROM vrsta_opreme WHERE sifra = {$equipment_type}";
            $select_type_equipment = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select_type_equipment);
            $type = $row['vrsta_opreme'];

            echo "<td>$type</td>";
            echo "<td>$equipment</td>";
            echo "<td>$equipment_serial</td>";
            echo "<td>$equipment_warranty_exp</td>";
            echo "<td>$equipment_note</td>";
            echo "<td class=\"text-center\">
                    <a href='equipments.php?change_to_active={$equipment_id}'>Aktivno</a>   |    
                    <a href='equipments.php?change_to_inactive={$equipment_id}'>Neaktivno</a>
                </td>";
            echo "<td class=\"text-center\">
                    <a href='equipments.php?source=edit_equipment&edit_equipment={$equipment_id}'><i class=\"fa fa-fw fa-edit\"></i></a>   |    
                    <a href='equipments.php?delete={$equipment_id}'><i class=\"fa fa-fw fa-eraser\"></i></a>
                </td>";
            echo "</tr>";
        }

        ?>
        </tbody>
    </table>
</div>


<?php

if(isset($_GET['change_to_active'])){
    $the_equipment_id = $_GET['change_to_active'];

    $query = "UPDATE equipment SET equipment_active = 'Da' WHERE equipment_id = {$the_equipment_id} ";
    $change_to_active_query = mysqli_query($connection, $query);

    header("Location: equipments.php");
}

if(isset($_GET['change_to_inactive'])){
    $the_equipment_id = $_GET['change_to_inactive'];

    $query = "UPDATE equipment SET equipment_active = 'Ne' WHERE equipment_id = {$the_equipment_id} ";
    $change_to_active_query = mysqli_query($connection, $query);

    header("Location: equipments.php");
}

if(isset($_GET['delete'])){
    $the_user_id = $_GET['delete'];

    $query = "DELETE FROM equipment WHERE equipment_id = {$the_equipment_id} ";
    $delete_user = mysqli_query($connection, $query);

    header("Location: equipments.php");
}



?>