<?php include "header.php";
include "connexionPdo.php";
$num = $_POST['num']; // je récupère le libelle du forulaire
$libelle = $_POST['libelle']; // je récupère le libelle du forulaire

$req=$monPdo->prepare("update nationalite set libelle = :libelle where num = :num");
$req->bindParam(':num', $num);
$req->bindParam(':libelle', $libelle);
$nb=$req->execute();

echo "<div class='container mt-5'>";
echo '<div class="row">
    <div class="col mt-3">';

if($nb == 1){
    echo ' <div class="alert alert-success" role="alert">
  La nationalité a bien été modifier !
</div> ';
}else{
    echo '<div class="alert alert-danger" role="alert">
   La nationalité n\'a pas été modifier !
</div>';
}
?>
<a href="listeNationalites.php" class="btn btn-primary"> Revenir à la liste des nationalités</a>
<?php include "footer.php";

?>