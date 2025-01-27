<?php include "header.php";
include "connexionPdo.php";
$req=$monPdo->prepare("select * from nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchALL();
?>


<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-9"><h2>Liste des nationalites</h2></div>
        <div class="col-3"><a href="formNationalite.php?action=Ajouter" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer une nationalité</a></div>
    </div>

    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="col-md-2">Numéro</th>
                <th scope="col" class="col-md-2">Libellé</th>
                <th scope="col" class="col-md-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($lesNationalites as $nationalite){
                    echo "<tr>";
                        echo "<td class='col-md-2'>$nationalite->num</td>";
                        echo "<td class='col-md-8'>$nationalite->libelle</td>";
                        echo "<td class='col-md-2'>
                            <a href='formNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                            <a href='#modalSuppression' data-toggle='modal' class='btn btn-danger'><i class='fas fa-trash'></i></a>
                        </td>";
                    echo "</tr>";
                }
                // supprimerNationalite.php?num=$nationalite->num'
            ?>
        </tbody>
    </table>
</div>
<div id="modalSuppression" class="modal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation de suppression</h5>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer cette nationalite</p>
      </div>
      <div class="modal-footer">
        <a href="supprimerNationalite.php?num=" class="btn btn-primary">Supprimer</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ne pas supprimer</button>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php";

?>