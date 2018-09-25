<table class="table table-bordered table-hover table-responsive">
    <thead>
    <tr>
        <th class="text-center"></th>
        <th class="text-center">Naziv</th>
        <th class="text-center">Adresa</th>
        <th class="text-center">Kontakt osoba</th>
        <th class="text-center">Kontakt osoba - telefon</th>
        <th class="text-center">Napomena</th>
        <th class="text-center">Akcija</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $count = 0;

    $query = "SELECT * FROM client";
    $select_clients = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_clients)){
        $client_id = $row['client_id'];
        $client = $row['client'];
        $client_address = $row['client_address'];
        $client_contact_person = $row['client_contact_person'];
        $client_contact_phone = $row['client_contact_phone'];
        $client_note = $row['client_note'];

        $count++;



        echo "<tr>";
        echo "<td>$count</td>";
        echo "<td>$client</td>";
        echo "<td>$client_address</td>";
        echo "<td>$client_contact_person</td>";
        echo "<td>$client_contact_phone</td>";
        echo "<td>$client_note</td>";
        echo "<td class=\"text-center\">
                    <a href='clients.php?source=edit_client&edit_client={$client_id}'><i class=\"fa fa-fw fa-edit\"></i></a>   |    
                    <a href='clients.php?delete={$client_id}'><i class=\"fa fa-fw fa-eraser\"></i></a>
                </td>";
        echo "</tr>";
    }

    ?>
    </tbody>
</table>

<?php

if(isset($_GET['delete'])){
    $the_client_id = $_GET['delete'];

    $query = "DELETE FROM client WHERE client_id = {$the_client_id} ";
    $delete_client = mysqli_query($connection, $query);

    header("Location: clients.php");
}



?>