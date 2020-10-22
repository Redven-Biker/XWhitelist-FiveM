<?php require('inc/config.php'); ?>
<?php require("inc/db.php"); ?>
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
        <?php
session_start();







if (isset($_SESSION['id'])) {
    echo '
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">'; ?>
                <a class="navbar-brand js-scroll-trigger" href="index.php"><?php echo$name ?></a>
            <?php echo '
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php">Home</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="add-player.php">Add Player Whitelist</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="inc/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead bg-dark text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <h1 class="masthead-heading text-uppercase mb-0">Players Whitelist</h1>
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Steam ID..">
<table id="myTable">
  <tr class="header">
    <th style="width:30%;">Steam ID</th>
    <th style="width:30%;">Discord ID</th>
    <th style="width:40%;">Date</th>
    <th style="width:40%;">Action</th>
  </tr>';
  $reponse = $bdd->query('SELECT * FROM whitelist ORDER BY id DESC');
  
  // Display each entry one by one
  while ($data = $reponse->fetch()) {
  ?> 
  <tr>
    <td><?php echo $data['identifier']; ?></td>
    <td><?php echo $data['discord_id']; ?></td>
    <td><?php echo $data['date']; ?></td>
                                                     
                                                     <form action='inc/delete_entry.php' method='post'>
                                                     <?php
        echo '<td>
                                                             <button type="submit" name="deleteplayerwhitelist" class="btn btn-danger w-100 py-1" value="' . $data['id'] . '">Delete</button>
                                                     </td>';
    ?>
                                                </form>
  </tr>
  <?php } $reponse->closeCursor(); echo '
</table>
<div class="space-index-footer"></div>
            </div>
        </header>
        <div class="copyright py-4 text-center text-white">'; ?>
            <div class="container"><small>Copyright © <?php echo$name_footer ?> 2020</small></div>
            <?php echo '
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <script src="js/scripts.js"></script>
        
        <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
    </body>
    </html>';
    } else {
        header("Location: login.php");
    }
    ?>