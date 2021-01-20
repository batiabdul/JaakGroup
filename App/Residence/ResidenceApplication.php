<?php
class ResidenceApplication extends Application
{
  public function __construct()
  {
    parent::__construct();

    $this->name = 'Residence';
  }

  public function run()
  {
    $controller = $this->getController();
    $controller->execute();


    $this->httpResponse->setPage($controller->page());
    $this->httpResponse->send();
  }
}
