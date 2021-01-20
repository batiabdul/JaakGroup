<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Formulaire pour ajouter un produit ../..</h4>
            <p class="card-description">Pour gerer les output...</p>
            <form class="forms-sample" action="../Ajax.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" name="key" value="AddProduct"hidden/>
                <label for="Categorie">Selectionner la categorie</label>
                <select class='form-control' name='category_id'>
                  <option>Choisir la categorie du produit</option>
                  <?= $Categoriedropdown ?>
                </select>
              </div>
              <div class="form-group">
                <label for="Nom">Nom</label>
                <input type="text" name="name" class="form-control" id="Nom" placeholder="Entrez le nom du produit" required />
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" id="description" placeholder="Entrez la description du produit" required />
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image" />
              </div>
              <button type="submit" name="submit" class="btn btn-gradient-primary mr-2">Ajouter</button>
              <button class="btn btn-light">Annuler</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tableau de la categorie</h4>
            <p class="card-description">Pour gerer les output...</p>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Categorie</th>
                  <th>Nom</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?=$productList?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="forms-sample" action="../Ajax.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" name="key" value="AddProduct"hidden/>
              <label for="Categorie">Selectionner la categorie</label>
              <select class='form-control' name='category_id'>
                <option>Choisir la categorie du produit</option>
                <?= $Categoriedropdown ?>
              </select>
            </div>
            <div class="form-group">
              <label for="Nom">Nom</label>
              <input type="text" name="name" class="form-control" id="Nom" placeholder="Entrez le nom du produit" required />
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" name="description" class="form-control" id="description" placeholder="Entrez la description du produit" required />
            </div>
          <div class="modal-footer">
            <button type="button" class="badge badge-secondary" data-dismiss="modal">Close</button>
            <button type="Submit" class="badge badge-success">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
