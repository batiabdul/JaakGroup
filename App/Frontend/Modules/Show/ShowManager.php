<?php

class ShowManager extends Managers
{
  protected $bdd;

  public function __construct($bdd)
  {
    $this->bdd = $bdd;

  }

  public function GetProductsBYid($id){
    $query = "SELECT * FROM products WHERE category_id ='".$id."'";
    $stmt = $this->bdd->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $i=0;
    $productbyid = "";
    while ($i < count($result)){
    $productbyid = $productbyid ."<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'>
                <!-- Block2 -->
                  <div class='block2'>
                    <div class='block2-img wrap-pic-w of-hidden pos-relative'>
                      <img src='/App/Backend/Web/images/uploads/".$result[$i]['image']."' style='width:250px; height:250px'/>
                      <div class='block2-overlay trans-0-4'>
                      <div class='block2 w-size1 trans-0-4'>
                        </div>
                      </div>
                    </div>
                  <div class='block2-txt p-t-20'>
                    <a href='/produit-demande-".$result[$i]['id']."' class='block2-name dis-block s-text3 p-b-5'>
                        ".$result[$i]['name']."
                      </a>
                    </div>
                  </div>
                </div>";
      $i=$i+1;
     }
      return $productbyid;
  }

      public function GetProduct($id){
        $query = "SELECT * FROM products WHERE id=$id ";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $dproductd = '<div class="flex-w flex-sb">
          <div class="w-size13 p-t-30 respon5">
            <div class="wrap-slick3 flex-sb flex-w">
              <div class="wrap-slick3-dots"></div>

              <div class="slick3">
                <div class="item-slick3" data-thumb="/App/Backend/Web/images/uploads/'.$result['image'].'">
                  <div class="wrap-pic-w">
                    <img src="/App/Backend/Web/images/uploads/'.$result['image'].'" alt="IMG-PRODUCT">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="w-size14 p-t-30 respon5">
            <!--  -->
            <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
              <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                Nom
                <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
              </h5>

              <div class="dropdown-content dis-none p-t-15 p-b-23">
                <p class="s-text8">'.$result['name'].'</p>
              </div>
            </div>

            <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
              <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                Description
                <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
              </h5>
              <div class="dropdown-content dis-none p-t-15 p-b-23">
                <p class="s-text8">'.$result['description'].'</p>
              </div>
            </div>
          </div>
        </div>';
          return $dproductd;
      }

      public function showComment()
      {
        $query = "SELECT * FROM infos";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $infos = '';
        foreach ($result as $oneResult) {
          $infos = $infos.'
          <div class="item-slick2 p-l-15 p-r-15" >
            <!-- Block2 -->
            <div class="block2">
              <div class="block2-txt p-t-20">
              <span class="block2-price m-text6 p-r-5" style="color:red">'.$oneResult['name'].'</span>
                <p class="block2-name dis-block s-text3 p-b-5">'.$oneResult['message'].'</p>
                <span>'.$oneResult['created'].'</span>
              </div>
            </div>
          </div>';
        }
        return $infos;
      }












}
