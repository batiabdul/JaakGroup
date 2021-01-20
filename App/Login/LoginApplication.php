<?php
class LoginApplication extends Application
{
  public function __construct()
  {
    parent::__construct();

    $this->name = 'Login';
  }

  public function run()
  {
    $controller = $this->getController();
    $controller->execute();


    $this->httpResponse->setPage($controller->page());
    $this->httpResponse->send();
  }
}
