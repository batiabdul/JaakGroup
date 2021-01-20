<?php
/**
 * @license Kits License
 * @author Andil ADEBIYI <andiladebiyi@gmail.com>
 * @Copyright (c) kits, 2019
 */
//namespace Kits;

class Page extends ApplicationComponent
{
  protected $contentFile;
  protected $vars = [];

  public function addVar($var, $value)
  {

    if (!is_string($var) || is_numeric($var) || empty($var))
    {
      throw new \InvalidArgumentException('Le nom de la variable doit être une chaine de caractères non nulle');
    }

    $this->vars[$var] = $value;

  }

  public function addMultipleVar($array)
  {
    foreach ($array as $key => $value) {
          if (!is_string($key) || is_numeric($key) || empty($key))
            {}else{
               $this->addVar($key, $value);
            }
    }
  }

  public function getGeneratedPage()
  {
    if (!file_exists($this->contentFile))
    {
      throw new \RuntimeException('La vue spécifiée n\'existe pas');
    }
    
    $user = $this->app->user();
    extract($this->vars);

    ob_start();
      require $this->contentFile;
    $content = ob_get_clean();

    ob_start();
      require 'App/'.$this->app->name().'/Templates/Layout.php';
    return ob_get_clean();
  }

  public function setContentFile($contentFile)
  {
    if (!is_string($contentFile) || empty($contentFile))
    {
      throw new \InvalidArgumentException('La vue spécifiée est invalide');
    }

    $this->contentFile = $contentFile;
  }
}