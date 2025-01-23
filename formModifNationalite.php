<?php include "header.php";
include "connexionPdo.php";
$num=$_GET['num'];
$req=$monPdo->prepare("select * from nationalite where num= :num");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->bindParam(':num', $num);
$req->execute();
$laNationalite=$req->fetch();


?>
<div class="container mt-5">
    <h2 class='pt-3 text-center'>Modifier une nationalité</h2>
    <form action="valideModifNationalite.php" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded">
        <div class="form-group">
            <label for="libelle"> Libellé</label>
            <input type="text" class='form-control' id='libelle' placehorder='Saisir le libellé' name='libelle' value="<?php echo $laNationalite->libelle; ?>">
        </div>
        <input type="hidden" id="num" name="num" value="<?php echo $laNationalite->num; ?>">
        <div class="row">
            <div class="col"> <a href="listeNationalites.php" class='btn btn-warning btn-block'> Revenir à la liste</a></div>
            <div class="col"><button type='submit' class='btn btn-success btn-block'> Modifier </button></div>
        </div>
    </form>
</div>
<?php include "footer.php";

?>