<?php

if(isset($_POST['create_user'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
//        $user_image = $_FILES['user_image']['name'];
//        $user_image_temp = $_FILES['user_image']['tmp_name'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

//        move_uploaded_file($user_image_temp, "../images/$user_image");

    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password ) ";
    $query .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$user_password}'  ) ";

    $create_user_query = mysqli_query($connection, $query);

    confirmQuery($create_user_query);

    header('Location: users.php');

}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">Ime</label>
        <input type="text" class="form-control" name="user_firstname" >
    </div>

    <div class="form-group">
        <label for="user_lastname">Prezime</label>
        <input type="text" class="form-control" name="user_lastname" >
    </div>

    <div class="form-group">
        <select name="user_role" id="user_role" class="custom-select custom-select-lg mb-3">
            <option selected value="subscriber">Odaberite ulogu korisnika</option>
            <option value="Administrator">Administrator</option>
            <option value="Operater">Operater</option>
        </select>
    </div>


    <!--    <div class="form-group">-->
    <!--        <label for="user_image">User Image</label>-->
    <!--        <input type="file" name="user_image" >-->
    <!--    </div>-->

    <div class="form-group">
        <label for="username">Korisničko ime</label>
        <input type="text" class="form-control" name="username" >
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" >
    </div>

    <div class="form-group">
        <label for="user_password">Lozinka</label>
        <input type="password" class="form-control" name="user_password" >
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Dodaj korisnika">
    </div>

</form>