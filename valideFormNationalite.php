<?php include "header.php";
  include "connexionPdo.php";
  $action=$_GET['action'];
  $num = $_POST['num']; // je récupère le libelle du forulaire
  $libelle = $_POST['libelle']; // je récupère le libelle du forulaire
  $continent = $_POST['continent']; // je récupère le continent du forulaire

  if($action == "Modifier"){
    $req=$monPdo->prepare("update nationalite set libelle = :libelle, numContinent= :continent where num = :num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
    $req->bindParam(':continent', $continent);
    $nb=$req->execute();
  }else{
    $req=$monPdo->prepare("insert into nationalite(libelle, numContinent) values(:libelle, :continent)");
    $req->bindParam(':libelle', $libelle);
    $req->bindParam(':continent', $continent);
  }
  $nb=$req->execute();
  $message=$action== "Modifier" ? "modifiée" : "ajoutée";

  echo "<div class='container mt-5'>";
  echo '<div class="row">
    <div class="col mt-3">';

  if($nb == 1){
    echo ' <div class="alert alert-success" role="alert">
    La nationalité a bien été '.$message.' </div> ';
  }else{
    echo '<div class="alert alert-danger" role="alert">
    La nationalité n\'a pas été'.$message.' </div>';
  }
?>
<a href="listeNationalites.php" class="btn btn-primary"> Revenir à la liste des nationalités</a>
<?php include "footer.php";

?>