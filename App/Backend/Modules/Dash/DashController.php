<?php


class DashController extends BackController
{
  /**
  * @license Monxwe License
  * @author Andil ADEBIYI <andiladebiyi@gmail.com>
  * @route /GestionMaison
  * @Copyright (c) Monxwe, 2019
  */

  public function executeIndex(HTTPRequest $request) {
    session_start();
    if (!isset($_SESSION['connect']) AND $_SESSION['connect'] != true)
    {
      header("location:/Login?accessdenied");
    } else {
      $title = '';
      $this->page->addVar('title', $title);
    }


  }

  public function executeCategories(HTTPRequest $request)
  {
    $managers = $this->managers->getManagerOf('Dash');
    $title = 'Categories';
    $this->page->addVar('title', $title);

    $CategorieOperation = $managers->CategorieOperation('table');
    $this->page->addVar('CategorieOperation', $CategorieOperation);
  }

  public function executeProduits(HTTPRequest $request)
  {
    $managers = $this->managers->getManagerOf('Dash');
    $title = 'Articles';
    $this->page->addVar('title', $title);

    $Categoriedropdown = $managers->CategoriesDropdown('table');
    $this->page->addVar('Categoriedropdown', $Categoriedropdown);

    $productList = $managers->ShowProduct('table');
    $this->page->addVar('productList',$productList);
  }

  public function executeOperation(HTTPRequest $request)
  {
    $title = 'Operation';
    $this->page->addVar('title', $title);
  }

  public function executeLogout(HTTPRequest $request)
  {

  }
}
