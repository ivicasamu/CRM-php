<?php

if(isset($_GET['edit_user'])){
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE user_id = $the_user_id";
    $select_edit_user_query = mysqli_query($connection, $query);

    confirmQuery($select_edit_user_query);

    while($row = mysqli_fetch_assoc($select_edit_user_query)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
    }
}

if(isset($_POST['edit_user'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$user_password}' ";
    $query .= "WHERE user_id = {$the_user_id} ";

    $edit_user_query = mysqli_query($connection, $query);

    confirmQuery($edit_user_query);

    header('Location: users.php');

}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">Ime</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname  ?>" >
    </div>

    <div class="form-group">
        <label for="user_lastname">Prezime</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname  ?>" >
    </div>

    <div class="form-group">
        <select name="user_role" id="user_role" class="custom-select custom-select-lg mb-3">
            <option selected value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
            <?php
            if($user_role == 'Administrator'){
                echo "<option value='Operater'>Operater</option>";
            } else {
                echo "<option value='Administrator'>Administrator</option>";
            }
            ?>
        </select>
    </div>


    <!--    <div class="form-group">-->
    <!--        <label for="user_image">User Image</label>-->
    <!--        <input type="file" name="user_image" >-->
    <!--    </div>-->

    <div class="form-group">
        <label for="username">Korisničko ime</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username  ?>" >
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email"value="<?php echo $user_email  ?>" >
    </div>

    <div class="form-group">
        <label for="user_password">Lozinka</label>
        <input type="password" class="form-control" name="user_password"value="<?php echo $user_password  ?>"  >
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Izmjeni podatke">
    </div>

</form>