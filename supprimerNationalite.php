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
    echo ' <div class="alert alert-success" role="alert">
    La nationalité a bien été supprimée </div> ';
  }else{
    echo '<div class="alert alert-danger" role="alert">
    Petit problème : La nationalité n\'a pas été supprimée </div>';
  }
?>
<a href="listeNationalites.php" class="btn btn-primary"> Revenir à la liste des nationalités</a>
<?php include "footer.php";

?>