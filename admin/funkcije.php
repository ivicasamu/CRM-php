<?php

    function confirmQuery($result){
        global $connection;

        if(!$result){
            die("QUERY FAILED. " . mysqli_error($connection));
        }
    }

// S - VRSTA GARANCIJE

    function createVrstaGarancije() {
        global $connection;

        if(isset($_POST['submit'])){
            $vrsta_garancije = $_POST['vrsta_garancije'];
            $trajanje_garancije = $_POST['trajanje_garancije'];
            $napomena = $_POST['napomena'];

            if($vrsta_garancije == "" || empty($vrsta_garancije)){
                echo "Ovo polje mora biti popunjeno";
            } else {
                $query = "INSERT INTO vrsta_garancije(vrsta_garancije, trajanje_garancije, napomena) values ('{$vrsta_garancije}', {$trajanje_garancije}, '{$napomena}')";
                $create_vrsta_garancije = mysqli_query($connection, $query);

                if(!$create_vrsta_garancije){
                    die('Greška unosa ' . mysqli_error($connection) );
                }
            }
        }
    }

    function readVrstaGarancije() {
        global $connection;
        $query = "SELECT * FROM vrsta_garancije";
        $select_vrsta_garancije = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_vrsta_garancije)){
            $sifra = $row['sifra'];
            $vrsta_garancije = $row['vrsta_garancije'];
            $trajanje_garancije = $row['trajanje_garancije'];
            $napomena = $row['napomena'];

            echo "<tr>";
            echo "<td>{$sifra}</td>";
            echo "<td>{$vrsta_garancije}</td>";
            echo "<td>{$trajanje_garancije}</td>";
            echo "<td>{$napomena}</td>";
            echo "<td class=\"text-center\">
                                                    <a href='vrsta_garancije.php?promijeni={$sifra}'><i class=\"fa fa-fw fa-edit\"></i></a>   |    
                                                    <a href='vrsta_garancije.php?obrisi={$sifra}'><i class=\"fa fa-fw fa-eraser\"></i></a>
                                            </td>";
            echo "</tr>";
        }
    }

    function updateVrstaGarancije() {
        global $connection;

        if(isset($_GET['promijeni'])){
            $sifra = $_GET['promijeni'];
            include('includes/promijeni_vrsta_garancije.php');
        }
    }

    function deleteVrstaGarancije() {
        global $connection;

        if(isset($_GET['obrisi'])){
            $sifra = $_GET['obrisi'];

            $query = "DELETE FROM vrsta_garancije WHERE sifra = {$sifra} ";
            $obrisi_vrsta_opreme = mysqli_query($connection, $query);
            header("Location: vrsta_garancije.php");
        }

    }

// E - VRSTA GARANCIJE

// S - VRSTA OPREME

    function createVrstaOpreme() {
        global $connection;

        if(isset($_POST['submit'])){
            $vrsta_opreme = $_POST['vrsta_opreme'];
            $napomena = $_POST['napomena'];

            if($vrsta_opreme == "" || empty($vrsta_opreme)){
                echo "Ovo polje mora biti popunjeno";
            } else {
                $query = "INSERT INTO vrsta_opreme(vrsta_opreme, napomena) values ('{$vrsta_opreme}', '{$napomena}')";
                $create_vrsta_opreme = mysqli_query($connection, $query);

                if(!$create_vrsta_opreme){
                    die('Greška unosa ' . mysqli_error($connection) );
                }
            }
        }
    }

    function readVrstaOpreme() {
        global $connection;
        $query = "SELECT * FROM vrsta_opreme";
        $select_vrsta_opreme = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_vrsta_opreme)){
            $sifra = $row['sifra'];
            $vrsta_opreme = $row['vrsta_opreme'];
            $napomena = $row['napomena'];

            echo "<tr>";
                echo "<td>{$sifra}</td>";
                echo "<td>{$vrsta_opreme}</td>";
                echo "<td>{$napomena}</td>";
                echo "<td class=\"text-center\">
                            <a href='vrsta_opreme.php?promijeni={$sifra}'><i class=\"fa fa-fw fa-edit\"></i></a>   |    
                            <a href='vrsta_opreme.php?obrisi={$sifra}'><i class=\"fa fa-fw fa-eraser\"></i></a>
                        </td>";
            echo "</tr>";
        }
    }

    function updateVrstaOpreme() {
        global $connection;

        if(isset($_GET['promijeni'])){
            $sifra = $_GET['promijeni'];
            include('includes/promijeni_vrsta_opreme.php');
        }
    }

    function deleteVrstaOpreme() {
        global $connection;

        if(isset($_GET['obrisi'])){
            $sifra = $_GET['obrisi'];

            $query = "DELETE FROM vrsta_opreme WHERE sifra = {$sifra} ";
            $obrisi_vrsta_opreme = mysqli_query($connection, $query);
            header("Location: vrsta_opreme.php");
        }
    }

// E - VRSTA OPREME

// S - VRSTA SERVISA

    function createVrstaServisa() {
        global $connection;

        if(isset($_POST['submit'])){
            $vrsta_servisa = $_POST['vrsta_servisa'];
            $napomena = $_POST['napomena'];

            if($vrsta_servisa == "" || empty($vrsta_servisa)){
                echo "Ovo polje mora biti popunjeno";
            } else {
                $query = "INSERT INTO vrsta_servisa(vrsta_servisa, napomena) values ('{$vrsta_servisa}', '{$napomena}')";
                $create_vrsta_servisa = mysqli_query($connection, $query);

                if(!$create_vrsta_servisa){
                    die('Greška unosa ' . mysqli_error($connection) );
                }
            }
        }
    }

    function readVrstaServisa() {
        global $connection;
        $query = "SELECT * FROM vrsta_servisa";
        $select_vrsta_servisa = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_vrsta_servisa)){
            $sifra = $row['sifra'];
            $vrsta_servisa = $row['vrsta_servisa'];
            $napomena = $row['napomena'];

            echo "<tr>";
                echo "<td>{$sifra}</td>";
                echo "<td>{$vrsta_servisa}</td>";
                echo "<td>{$napomena}</td>";
                echo "<td class=\"text-center\">
                            <a href='vrsta_servisa.php?promijeni={$sifra}'><i class=\"fa fa-fw fa-edit\"></i></a>   |    
                            <a href='vrsta_servisa.php?obrisi={$sifra}'><i class=\"fa fa-fw fa-eraser\"></i></a>
                        </td>";
            echo "</tr>";
        }
    }

    function updateVrstaServisa() {
        global $connection;

        if(isset($_GET['promijeni'])){
            $sifra = $_GET['promijeni'];
            include('includes/promijeni_vrsta_servisa.php');
        }
    }

    function deleteVrstaServisa() {
        global $connection;

        if(isset($_GET['obrisi'])){
            $sifra = $_GET['obrisi'];

            $query = "DELETE FROM vrsta_servisa WHERE sifra = {$sifra} ";
            $obrisi_vrsta_servisa = mysqli_query($connection, $query);
            header("Location: vrsta_servisa.php");
        }
    }

// E - VRSTA SERVISA

// S - VRSTA VERZIJE SW

    function createVrstaVerzijeSw() {
        global $connection;

        if(isset($_POST['submit'])){
            $vrsta_verzije = $_POST['vrsta_verzije'];
            $napomena = $_POST['napomena'];

            if($vrsta_verzije == "" || empty($vrsta_verzije)){
                echo "Ovo polje mora biti popunjeno";
            } else {
                $query = "INSERT INTO vrsta_verzije(vrsta_verzije, napomena) values ('{$vrsta_verzije}', '{$napomena}')";
                $create_vrsta_verzije = mysqli_query($connection, $query);

                if(!$create_vrsta_verzije){
                    die('Greška unosa ' . mysqli_error($connection) );
                }
            }
        }
    }

    function readVrstaVerzijeSw() {
        global $connection;
        $query = "SELECT * FROM vrsta_verzije";
        $select_vrsta_verzije = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_vrsta_verzije)){
            $sifra = $row['sifra'];
            $vrsta_verzije = $row['vrsta_verzije'];
            $napomena = $row['napomena'];

            echo "<tr>";
                echo "<td>{$sifra}</td>";
                echo "<td>{$vrsta_verzije}</td>";
                echo "<td>{$napomena}</td>";
                echo "<td class=\"text-center\">
                            <a href='vrsta_verzije_sw.php?promijeni={$sifra}'><i class=\"fa fa-fw fa-edit\"></i></a>   |    
                            <a href='vrsta_verzije_sw.php?obrisi={$sifra}'><i class=\"fa fa-fw fa-eraser\"></i></a>
                        </td>";
            echo "</tr>";
        }
    }

    function updateVrstaVerzijeSw() {
        global $connection;

        if(isset($_GET['promijeni'])){
            $sifra = $_GET['promijeni'];
            include('includes/promijeni_vrsta_verzije_sw.php');
        }
    }

    function deleteVrstaVerzijeSw() {
        global $connection;

        if(isset($_GET['obrisi'])){
            $sifra = $_GET['obrisi'];

            $query = "DELETE FROM vrsta_verzije WHERE sifra = {$sifra} ";
            $obrisi_vrsta_verzije = mysqli_query($connection, $query);
            header("Location: vrsta_verzije_sw.php");
        }
    }

?>