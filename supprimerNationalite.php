<?php include "header.php";
    include "connexionPdo.php";
    $num=$_GET['num'];

    $req=$monPdo->prepare("delete from nationalite where num = :num");
    $req->bindParam(':num', $num);
    $nb=$req->execute();

  echo "<div class='container mt-5'>";
  echo '<div class="row">
    <div class="col mt-3">';

  if($nb == 1){
    $_SESSION['message']=["success"=>"La nationalité a bien été supprimée"];
  }else{
    $_SESSION['message']=["danger"=>"La nationalité a bien été supprimée"];
  }
  header('location: listeNationalites.php');
  exit();
?>