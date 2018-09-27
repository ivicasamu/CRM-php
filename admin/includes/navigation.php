<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">AVinstal CRM</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-gear"></i><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="vrsta_opreme.php"><i class="fa fa-files-o fa-fw"></i> Vrsta opreme</a>
                </li>
                <li>
                    <a href="vrsta_garancije.php"><i class="fa fa-file-o fa-fw"></i> Vrsta garancije</a>
                </li>
                <li>
                    <a href="vrsta_servisa.php"><i class="fa fa-file-text-o fa-fw"></i> Vrsta servisa</a>
                </li>
                <li>
                    <a href="vrsta_verzije_sw.php"><i class="fa fa-file-text-o fa-fw"></i> Vrsta verzije SW/FW</a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>
                <?php

                    if(isset($_SESSION['username'])){
                        $username = $_SESSION['username'];

                        $query = "SELECT * FROM users WHERE username = '{$username}'";
                        $select_user_profile = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_user_profile)){
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];

                            echo $user_firstname . " " . $user_lastname;
                        }
                    }

                ?>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profil korisnika</a>
                </li>
<!--                <li>-->
<!--                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>-->
<!--                </li>-->
                <li class="divider"></li>
                <li>
                    <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Odjava</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="calendar.php"><i class="fa fa-fw fa-calendar"></i> TeamUp kalendar</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#clients"><i class="fa fa-fw fa-users"></i> Klijenti <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="clients" class="collapse">
                    <li>
                        <a href="clients.php">Svi klijenti</a>
                    </li>
                    <li>
                        <a href="clients.php?source=add_client">Dodaj novog klijenta</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#equipments"><i class="fa fa-cubes"></i> Oprema <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="equipments" class="collapse">
                    <li>
                        <a href="equipments.php">Sva oprema</a>
                    </li>
                    <li>
                        <a href="equipments.php?source=add_equipment">Dodaj novi uređaj</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="services.php"><i class="fa fa-fw fa-wrench"></i> Servisi opreme</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-user"></i> Korisnici <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="users" class="collapse">
                    <li>
                        <a href="users.php">Svi korisnici</a>
                    </li>
                    <li>
                        <a href="users.php?source=add_user">Dodaj novog korisnika</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>