<?php include 'includes/header.php'; ?>

<?php

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $select_user_profile = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_user_profile)){
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
        $query .= "WHERE username = '{$username}' ";

        $edit_user_query = mysqli_query($connection, $query);

        confirmQuery($edit_user_query);

        header('Location: profile.php');

    }

?>

    <!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Profil korisnika
                    </h1>

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
                            <input class="btn btn-primary" type="submit" name="edit_user" value="Izmjeni profil">
                        </div>



                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include 'includes/footer.php'; ?>