<?php
/**
 * @license Kits License
 * @author Andil ADEBIYI <andiladebiyi@gmail.com>
 * @Copyright (c) kits, 2019
 */
//namespace Kits;
abstract class ApplicationComponent
{
  protected $app;
  
  public function __construct(Application $app)
  {
    $this->app = $app;
  }
  
  public function app()
  {
    return $this->app;
  }
}