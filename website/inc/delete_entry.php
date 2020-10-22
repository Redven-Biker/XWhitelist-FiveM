<?php
include( "config.php" );
include( "db.php" );

if(isset($_POST['deleteplayerwhitelist']) and is_numeric($_POST['deleteplayerwhitelist']))
{
  $id = $_POST['deleteplayerwhitelist'];
  $count=$bdd->prepare("DELETE FROM whitelist WHERE id=:id");
  $count->bindParam(":id",$id,PDO::PARAM_INT);
  $count->execute();
  header('Location: ../index.php');
};

if(isset($_POST['deletemoderator']) and is_numeric($_POST['deletemoderator']))
{
  $id = $_POST['deletemoderator'];
  $count=$bdd->prepare("DELETE FROM users_whitelist WHERE id=:id");
  $count->bindParam(":id",$id,PDO::PARAM_INT);
  $count->execute();
  header('Location: ../admin/index.php');
};

?>
