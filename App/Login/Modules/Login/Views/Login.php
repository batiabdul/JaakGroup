<section class="newproduct bgwhite p-t-150">
  <div class="container">
    <div class="row">
      <div class="col-md-4 p-b-30"></div>
        <div class="col-md-4 p-b-30">
        <h4 class="m-text5 t-center"><?=$greeting?> admin!</h4>
        <h5 class="font-weight-light t-center p-t-20">Bienvenue sur le tableau de bord.</h5>
        <h6 class="font-weight-light t-center p-t-20" style="color:red;"><?=$displayError?></h6>
        <form class="pt-3" action="Ajax.php" method="post">
          <div class="form-group">
            <input type="text" name="key" value="Login" hidden />
          </div>
          <div class="form-group">
            <input type="email" class="form-control form-control-lg" name="mailUser" id="exampleInputEmail1" placeholder="Identifiant..." />
          </div>
          <div class="form-group">
            <input type="password" class="form-control form-control-lg" name="pwdUser" id="exampleInputPassword1" placeholder="Code..." />
          </div>
          <div class="mt-3">
            <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" name="login-submit" value="Authentification" />
          </div>
          <div class="my-2 d-flex justify-content-between align-items-center">
            <a href="#" class="auth-link text-black">Code oublié?</a>
          </div>
        </form>
      </div>
    </div>
  </section>
