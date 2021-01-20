 <?php
 /**
* @license JAAKGROUP License
* @author Abdou BATOUMI <batiabdul5@gmail.com>
* @route /Login
* @Copyright (c) JAAKGROUP, 2020
*/

class LoginController extends BackController
{
  public function executeLogin(HTTPRequest $request)
  {
    $title = 'Connexion';
    $this->page->addVar('title', $title);

    // Handling the error display messages for the admin
    $managers = $this->managers->getManagerOf('Login');
    $id = $request ->getData('id');
    if ($id == '') {
      $displayError = '';
      $this->page->addVar('displayError', $displayError);
    } elseif ($id == '?empty') {
      $displayError = 'Please fill in the form to log in...';
      $this->page->addVar('displayError', $displayError);
    } elseif ($id == '?wrongdetails') {
      $displayError = 'Please enter the correct';
      $this->page->addVar('displayError', $displayError);
    } elseif ($id == '?accessdenied') {
      $displayError = 'Access denied, please log in first';
      $this->page->addVar('displayError', $displayError);
    } else {
      $displayError = 'Login successfull, wait for a redirection...';
      $this->page->addVar('displayError', $displayError);
    }

    // Added to greet admin on login page
    $time = date('H');
    if ($time < 12) {
      $greeting = 'Bonjour';
      $this->page->addVar('greeting', $greeting);
    } else {
      $greeting = 'Bonsoir';
      $this->page->addVar('greeting', $greeting);
    }
  }
}
