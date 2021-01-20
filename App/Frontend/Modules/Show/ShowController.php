 <?php
class ShowController extends BackController
{
  /**
* @license JAAKGROUP License
* @author Abdul BATI <batiabdul5@gmail.com>
* @Copyright (c) JAAKGROUP, 2020
*/

  public function executeIndex(HTTPRequest $request)
  {
    $title = 'Accueil';
    $this->page->addVar('title', $title);
  }

  /**
* @license JAAKGROUP License
* @author Abdul BATI <batiabdul5@gmail.com>
* @Copyright (c) JAAKGROUP, 2020
*/

  public function executeJaakservices(HTTPRequest $request)
  {
    $title = 'Services';
    $this->page->addVar('title', $title);
  }

  /**
* @license JAAKGROUP License
* @author Abdul BATI <batiabdul5@gmail.com>
* @Copyright (c) JAAKGROUP, 2020
*/

  public function executeProduct(HTTPRequest $request)
  {
    $managers = $this->managers->getManagerOf('Show');
    $id = $request ->getData('id');
    $title = 'Articles';
    $this->page->addVar('title', $title);
    $productbyid = $managers->GetProductsBYid($id);
    $this->page->addVar('productbyid', $productbyid);

  }

  /**
* @license JAAKGROUP License
* @author Abdul BATI <batiabdul5@gmail.com>
* @Copyright (c) JAAKGROUP, 2020
*/

  public function executeDetail(HTTPRequest $request)
  {
    $managers = $this->managers->getManagerOf('Show');
    $id = $request ->getData('id');
    $title = "Details";
    $this->page->addVar('title', $title);
    $dproductd = $managers->GetProduct($id);
    $this->page->addVar('dproductd', $dproductd);

  }

  /**
* @license JAAKGROUP License
* @author Abdul BATI <batiabdul5@gmail.com>
* @Copyright (c) JAAKGROUP, 2020
*/

  public function executeAbout(HTTPRequest $request)
  {
    $title = 'A propos';
    $this->page->addVar('title', $title);
  }

  /**
* @license JAAKGROUP License
* @author Abdul BATI <batiabdul5@gmail.com>
* @Copyright (c) JAAKGROUP, 2020
*/

  public function executeContact(HTTPRequest $request)
  {
    $managers = $this->managers->getManagerOf('Show');
    $title = 'Contact';
    $this->page->addVar('title', $title);
    $infos = $managers->showComment();
    $this ->page->addVar('infos', $infos);
  }
 }
