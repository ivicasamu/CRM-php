<?php

if(isset($_POST['create_client'])){
    $client = $_POST['client'];
    $client_address = $_POST['client_address'];
    $client_phone = $_POST['client_phone'];
    $client_email = $_POST['client_email'];
    $client_contact_person = $_POST['client_contact_person'];
    $client_contact_phone = $_POST['client_contact_phone'];
    $client_contact_email = $_POST['client_contact_email'];
    $client_note = $_POST['client_note'];

    $query = "INSERT INTO client(client, client_address, client_phone, client_email, client_contact_person, client_contact_phone, client_contact_email, client_note) ";
    $query .= "VALUES('{$client}', '{$client_address}', '{$client_phone}', '{$client_email}', '{$client_contact_person}', '{$client_contact_phone}', '{$client_contact_email}', '{$client_note}'  ) ";

    $create_client_query = mysqli_query($connection, $query);

    confirmQuery($create_client_query);

    header('Location: clients.php');

}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="client">Naziv</label>
        <input type="text" class="form-control" name="client" >
    </div>

    <div class="form-group">
        <label for="client_address">Adresa</label>
        <input type="text" class="form-control" name="client_address" >
    </div>

    <div class="form-group">
        <label for="client_phone">Telefon</label>
        <input type="text" class="form-control" name="client_phone" >
    </div>

    <div class="form-group">
        <label for="client_email">Email</label>
        <input type="email" class="form-control" name="client_email" >
    </div>

    <div class="form-group">
        <label for="client_contact_person">Kontakt osoba</label>
        <input type="text" class="form-control" name="client_contact_person" >
    </div>

    <div class="form-group">
        <label for="client_contact_phone">Kontakt osoba - telefon</label>
        <input type="text" class="form-control" name="client_contact_phone" >
    </div>

    <div class="form-group">
        <label for="client_contact_email">Kontakt osoba - email</label>
        <input type="text" class="form-control" name="client_contact_email" >
    </div>

    <div class="form-group">
        <label for="client_note">Napomena</label>
        <textarea class="form-control" name="client_note" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_client" value="Dodaj klijenta">
    </div>

</form>