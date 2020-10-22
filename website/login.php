<?php require('inc/config.php'); ?>
<?php require("inc/db.php"); ?>
<?php
session_start();

if(isset($_POST['formconnexion'])) {
   $usernameconnect = htmlspecialchars($_POST['usernameconnect']);
   $passwordconnect = sha1($_POST['passwordconnect']);
   if(!empty($usernameconnect) AND !empty($passwordconnect)) {
      $requser = $bdd->prepare("SELECT * FROM users_whitelist WHERE username = ? AND password = ?");
      $requser->execute(array($usernameconnect, $passwordconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['username'] = $userinfo['username'];
         header("Location: index.php?id=".$_SESSION['id']);
      } else {
         $erreur = "Username or password is invalid !";
      }
   } else {
      $erreur = "All fields should be completed !";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo$name_top ?></title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <header class="masthead bg-dark text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <h1 class="masthead-heading text-uppercase mb-0">Login</h1>
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
<?php
         if(isset($erreur)) {
            echo '
            <div class="alert alert-danger" role="alert">
            '.$erreur."
            </div>";
         } ?>
<form method="POST" action="">
    <input type="text" class="form-control" name="usernameconnect" placeholder="Username" required>
    <div class="space-input-login"></div>
    <input type="password" class="form-control" name="passwordconnect" placeholder="Password" required>
    <div class="space-input-login"></div>
<button type="submit" class="btn btn-success" name="formconnexion">Login</button>
    </form>
            </div>
        <div class="space-footer-login"></div>
        </header>
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © <?php echo$name_footer ?> 2020</small></div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
