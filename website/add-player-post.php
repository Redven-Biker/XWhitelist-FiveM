<?php
// Calls for the config file
include( "inc/db.php" );



// Insert the information
$req = $bdd->prepare('INSERT INTO whitelist (identifier, discord_id) VALUES(?, ?)');
$req->execute(array($_POST['identifier'], $_POST['discord_id']));

// Redirect user back to the add criminal page
header('Location: index.php');

?>
