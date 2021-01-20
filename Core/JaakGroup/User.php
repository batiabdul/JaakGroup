<?php
/**
 * @license JAAKGROUP License
 * @author Abdou BATOUMI <batiabdul5@gmail.com>
 * @Copyright (c) JAAKGROUP, 2020
 * @namespace akdiGicom;
 */

class User
{

  public function __construct($bdd)
  {
    $this->bdd = $bdd;
  }

  /**
  * @author : Abdul Bati
  * ifEntiterExist() est une methode qui verifie les informations de l'utilisateur dans m'inporte qu'elle table
  * @param  string : $table  Le nom de la table dans laquelle les informations seront verifier
  * @param $checkby le nom du champs de vérification
  * @param $valueckec valeur correspondant au champs de vérifiaction
  * @date : 11/10/2019
  * @return No elles n'existe pas  et Yes si elle existe
  */
  public function ifEntiterExist($table, $checkby, $valucheck, $checkby2 = null, $valucheck2 = null) {
        if (isset($checkby2) && isset($valucheck2)) {
            $text = "SELECT COUNT(*) FROM ".$table." WHERE ".$checkby." LIKE '".$valucheck."' AND ".$checkby2." LIKE '".$valucheck2."'";
            $request = $this->bdd->query($text);
            $count = $request->fetchColumn();
            if ($count == 0) {
                return false;
            } else {
                return true;
            }
        }
    }

}
