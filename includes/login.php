<?php include '../admin/includes/konfiguracija.php'; ?>
<?php include '../admin/funkcije.php'; ?>
<?php session_start(); ?>

<?php

if(isset($_POST['login'])){
    //echo "login";
    $username = $_POST['username'];
    $password = $_POST['user_password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_query = mysqli_query($connection, $query);

    confirmQuery($select_user_query);

    while($row = mysqli_fetch_assoc($select_user_query)){
        $db_user_id = $row['user_id'];
        $db_user_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
    }

    if($username === $db_user_username && $password === $db_user_password){
        $_SESSION['username'] = $db_user_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;

        header('Location: ../admin/');

    } else {
        header('Location: ../index.php?login');
    }
}

?>