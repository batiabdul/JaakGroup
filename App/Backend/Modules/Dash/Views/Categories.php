
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#"></a></li>
                  <li class="breadcrumb-item active" aria-current="page" style="display: none;"></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Formulaire Pour Ajouter Une Categorie ../..</h4>
                    <p class="card-description"> Pour gerer les output... </p>
                    <form class="forms-sample" action="../Ajax.php" method="post">
                      <input type="text" name="key" value="AddCategory" hidden>
                      <div class="form-group">
                        <label for="Categorie">Categorie</label>
                        <input type="text" class="form-control" name="category_name" id="Categorie" placeholder="Entrez categorie">
                      </div>
                      <button type="submit" name="submit" class="btn btn-gradient-primary mr-2">Ajouter</button>
                      <button class="btn btn-light">Annuler</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tableau de la categorie</h4>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Categorie</th>
                          <th>Modifier</th>
                          <th>Supprimer</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?=$CategorieOperation ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
