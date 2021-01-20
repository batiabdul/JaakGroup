 <?php


class ResidenceController extends BackController
{
    /**
 * @license Monxwe License
 * @author Andil ADEBIYI <andiladebiyi@gmail.com>
 * @route /GestionMaison
 * @Copyright (c) Monxwe, 2019
 */

  public function executeIndex(HTTPRequest $request)
  {
    $title = 'Residence';
    $this->page->addVar('title', $title);
  }

 }
