<div class="table-responsive">
    <table class="table table-bordered table-hover table-responsive">
        <thead>
        <tr>
            <th class="text-center">Šifra</th>
            <th class="text-center">Korisničko ime</th>
            <th class="text-center">Ime</th>
            <th class="text-center">Prezime</th>
            <th class="text-center">Email</th>
            <th class="text-center">Uloga korisnika</th>
            <th class="text-center">Promjena uloge korisnika</th>
            <th class="text-center">Akcija</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $query = "SELECT * FROM users";
        $select_users = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_users)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];



            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td>$username</td>";
            echo "<td>$user_firstname</td>";
            echo "<td>$user_lastname</td>";
            echo "<td>$user_email</td>";
            echo "<td>$user_role</td>";
            echo "<td class=\"text-center\">
                    <a href='users.php?change_to_admin={$user_id}'>Administrator</a>   |    
                    <a href='users.php?change_to_subscriber={$user_id}'>Operater</a>
                </td>";
            echo "<td class=\"text-center\">
                    <a href='users.php?source=edit_user&edit_user={$user_id}'><i class=\"fa fa-fw fa-edit\"></i></a>   |    
                    <a href='users.php?delete={$user_id}'><i class=\"fa fa-fw fa-eraser\"></i></a>
                </td>";
            echo "</tr>";
        }

        ?>
        </tbody>
    </table>
</div>

<?php

if(isset($_GET['change_to_admin'])){
    $the_user_id = $_GET['change_to_admin'];

    $query = "UPDATE users SET user_role = 'Administrator' WHERE user_id = {$the_user_id} ";
    $change_to_admin_query = mysqli_query($connection, $query);

    header("Location: users.php");
}

if(isset($_GET['change_to_subscriber'])){
    $the_user_id = $_GET['change_to_subscriber'];

    $query = "UPDATE users SET user_role = 'Operater' WHERE user_id = {$the_user_id} ";
    $change_to_subscriber_query = mysqli_query($connection, $query);

    header("Location: users.php");
}

if(isset($_GET['delete'])){
    $the_user_id = $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
    $delete_user = mysqli_query($connection, $query);

    header("Location: users.php");
}



?>