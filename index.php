<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="media/favicon/favicon.ico">

    <title>AVinstal CRM prijava</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="includes/login.php" method="post">
        <img class="mb-4" src="media/logo.png" alt="" width="100" height="100">
        <h1 class="h3 mb-3 font-weight-normal">Prijava u sustav</h1>
        <label for="username" class="sr-only">Korisničko ime</label>
        <input type="text" name="username" class="form-control" placeholder="Korisničko ime" required autofocus>
        <label for="user_password" class="sr-only">Lozinka</label>
        <input type="password" name="user_password" class="form-control" placeholder="Lozinka" required>
        <?php
            if(isset($_GET['login'])){
                echo "<h6 class='text-danger'>Korisničko ime ili lozinka su netočni. Pokušajte ponovno. </h6>";
            }
        ?>
        <button class="btn btn-lg btn-dark btn-block" type="submit" name="login" >Prijava</button>
      <p class="mt-5 mb-3 text-muted">AVinstal &copy; <?php echo date("Y"); ?></p>
    </form>
  </body>
</html>
