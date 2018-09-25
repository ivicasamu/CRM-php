<?php

if(isset($_GET['edit_client'])){
    $the_client_id = $_GET['edit_client'];

    $query = "SELECT * FROM client WHERE client_id = $the_client_id";
    $select_edit_client_query = mysqli_query($connection, $query);

    confirmQuery($select_edit_client_query);

    while($row = mysqli_fetch_assoc($select_edit_client_query)){
        $client = $row['client'];
        $client_address = $row['client_address'];
        $client_phone = $row['client_phone'];
        $client_email = $row['client_email'];
        $client_contact_person = $row['client_contact_person'];
        $client_contact_phone = $row['client_contact_phone'];
        $client_contact_email = $row['client_contact_email'];
        $client_note = $row['client_note'];
    }
}

if(isset($_POST['edit_client'])){
    $client = $_POST['client'];
    $client_address = $_POST['client_address'];
    $client_phone = $_POST['client_phone'];
    $client_email = $_POST['client_email'];
    $client_contact_person = $_POST['client_contact_person'];
    $client_contact_phone = $_POST['client_contact_phone'];
    $client_contact_email = $_POST['client_contact_email'];
    $client_note = $_POST['client_note'];

    $query = "UPDATE client SET ";
    $query .= "client = '{$client}', ";
    $query .= "client_address = '{$client_address}', ";
    $query .= "client_phone = '{$client_phone}', ";
    $query .= "client_email = '{$client_email}', ";
    $query .= "client_contact_person = '{$client_contact_person}', ";
    $query .= "client_contact_phone = '{$client_contact_phone}', ";
    $query .= "client_contact_email = '{$client_contact_email}', ";
    $query .= "client_note = '{$client_note}' ";
    $query .= "WHERE client_id = {$the_client_id} ";

    $edit_client_query = mysqli_query($connection, $query);

    confirmQuery($edit_client_query);

    header('Location: clients.php');

}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="client">Naziv</label>
        <input type="text" class="form-control" name="client" value="<?php echo $client; ?>" >
    </div>

    <div class="form-group">
        <label for="client_address">Adresa</label>
        <input type="text" class="form-control" name="client_address" value="<?php echo $client_address; ?>" >
    </div>

    <div class="form-group">
        <label for="client_phone">Telefon</label>
        <input type="text" class="form-control" name="client_phone" value="<?php echo $client_phone; ?>" >
    </div>

    <div class="form-group">
        <label for="client_email">Email</label>
        <input type="email" class="form-control" name="client_email" value="<?php echo $client_email; ?>" >
    </div>

    <div class="form-group">
        <label for="client_contact_person">Kontakt osoba</label>
        <input type="text" class="form-control" name="client_contact_person" value="<?php echo $client_contact_person; ?>" >
    </div>

    <div class="form-group">
        <label for="client_contact_phone">Kontakt osoba - telefon</label>
        <input type="text" class="form-control" name="client_contact_phone" value="<?php echo $client_contact_phone; ?>" >
    </div>

    <div class="form-group">
        <label for="client_contact_email">Kontakt osoba - email</label>
        <input type="text" class="form-control" name="client_contact_email" value="<?php echo $client_contact_email; ?>" >
    </div>

    <div class="form-group">
        <label for="client_note">Napomena</label>
        <textarea class="form-control" name="client_note" id="" cols="30" rows="10" ><?php echo $client_note; ?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_client" value="Izmjeni podatke">
    </div>

</form>