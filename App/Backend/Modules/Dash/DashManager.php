<?php

class DashManager extends Managers
{
  protected $bdd;

  public function __construct($bdd)
  {
    $this->bdd = $bdd;

  }


  public function GetAllProducts($table){
    $query = "SELECT products.id, products.name, products.description, products.category_id, categories.category_name, products.image
              FROM products INNER JOIN categories ON products.category_id = categories.category_id";
    $stmt = $this->bdd->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $i=0;
    $dproduct = "";
    while ($i < count($result)){
    $dproduct = $dproduct ."<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'>
        				<!-- Block2 -->
    							<div class='block2'>
    								<div class='block2-img wrap-pic-w of-hidden pos-relative'>
    									<img src='/App/Frontend/images/uploads/	".$result[$i]['image']."' style='width:250px; height:250px'/>
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
      return $dproduct;
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
                <div class="item-slick3" data-thumb="">
                  <div class="wrap-pic-w">
                    <img src="/App/Frontend/Web/images/uploads'.$result['image'].'" alt="IMG-PRODUCT">
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

      public function CategoriesDropdown($table){
        $query = "SELECT category_id, category_name FROM categories";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $i=0;
        $Categoriedropdown = "";
        while ($i < count($result)){
        $Categoriedropdown = $Categoriedropdown ."<option value='".$result[$i]['category_id']."'>".$result[$i]['category_name']."</option>";
          $i=$i+1;
        }
          return $Categoriedropdown;
          }

      public function CategorieOperation($table){
        $query = "SELECT category_id, category_name FROM categories";
        $stmt = $this->bdd->prepare($query);
        $stmt -> execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $i=1;
        $CategorieOperation="";
        foreach ($result as $oneResult) {
          $CategorieOperation = $CategorieOperation."<tr>
                          <td>".$i."</td>
                          <td>".$oneResult['category_name']."</td>
                          <td><a href='link' class='badge badge-info'>Modifier</a></td>
                          <td><a href='link' class='badge badge-danger'>Supprimer</a></td>
                        </tr>";
        $i=$i+1;

        }
        return $CategorieOperation;

      }

      public function ShowProduct($table){
        $query = "SELECT products.id, products.name, products.description, products.category_id, categories.category_name, products.image
                  FROM products INNER JOIN categories ON products.category_id = categories.category_id";
        $stmt = $this->bdd->prepare($query); $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $i=0;
        $productList = "";
        foreach ($result as $oneResult) {
          $i=$i+1;
          $productList = $productList."<tr>
          <td>".$i."</td>
          <td>".$oneResult['category_name']."</td>
          <td>".$oneResult['name']."</td>
          <td><p class='text-truncate'>".$oneResult['description']."</p></td>
          <td><button type='button' class='badge badge-info' data-toggle='modal'
          data-target='#exampleModal'>Modifier</button></td>
          <td><a href='link' class='badge badge-danger'>Supprimer</a></td>";
        }
        return $productList;
      }

}
