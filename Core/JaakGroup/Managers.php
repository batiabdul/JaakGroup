<?php
  /**
   * @license Abdul Bati License
   * @author Abdul Bati <batiabdul5@gmail.com>
   * @Copyright (c) batiabdul, 2019
   */
  //namespace Kits;
  class Managers
  {
    protected $bdd ;
    public $lastId_user;
    protected $managers = [];

    public function __construct($bdd)
    {
      $this->bdd = $bdd;
    }

    public function getManagerOf($module)
    {
      if (!is_string($module) || empty($module))
      {
        throw new \InvalidArgumentException('Le module spécifié est invalide');
      }

      if (!isset($this->managers[$module]))
      {
        $manager = $module.'Manager';

        $this->managers[$module] = new $manager($this->bdd);
      }

      return $this->managers[$module];
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


      /**
       * @author : Abdul Bati
       * getEntiter() est une methode qui prend les information dans n'importe qu'elle table
       * @param  string : $table  Le nom de la table dans laquelle les informations seront prise
       * @date : 11/10/2019
       * @return le nombre si tous vas bien et  l'exeption si il y a une erreur
       */
      public function getEntiter($table) {

          $text = "SELECT * FROM " . $table;
          try {
              $request = $this->bdd->query($text);
              $entiter = $request->fetchAll();
              return $entiter;
          } catch (PDOException $e) {
              echo "Récuperation des informations  échoué:" . $e->getMessage();
              return false;
          }
      }



      /**
       * @author : Abdul Bati
       * LoginUserInfos() est une methode qui permet au utilisateur de se connecter
       * @param  string : $table  Le nom de la table dans laquelle les informations seront verifier et prise
       * @param $email_numero le numeros ou le mail
       * @param $pasw le mot de passe
       * @date : 11/10/2019
       * @return fasle si  il n'est pas utilisateur  ou les infos si tous vas bien
       */
      public function LoginUserInfos($email, $psw) {

          $table = "users";
          $checkby = 'email';

          if ($this->ifEntiterExist($table, "email", $email, "psw", $psw)) {
              return $this->getEntiter($table, "email", $email);
          } else {
              return false;
          }
      }

    public function GetlastId(){
        return $this->lastId_user;
    }

    /**
     * @author : andil Adebiyi
     * AddUserInfos est une methode qui ajoute les informations de l'utilisateur dans m'inporte qu'elle table
     * @param  string : $table  Le nom de la table dans laquelle les informations seront inserer
     * @champ est un tableau qui a pour cle le nom des champs de la table de la base de donnee dont les valeurs correspond a celle qui seront
     * inserer Ex: $table="user", $champs=["user_email"=>"12345@mail.com","user_name"=>andil,"user_lastName"=>"adebiyi"],
     * @date : 11/10/2019
     * @return true  si tous c'est bien passer et l'exeption si il y a une erreur
     */
    public function AddUserInfos($table, $champ = array()) {
        $champs = "";
        $values = "";
        $var = 1;

        foreach ($champ as $key => $value) {

            if ($var == 1) {
                $champs = $champs . $key;
                $value = str_replace('"', '\"', $value);
                $values = $values . '"' . $value . '"';

                $var = $var + 1;
            } else {
                $champs = $champs . ',' . $key;
                $value = str_replace('"', '\"', $value);
                $values = $values . ',' . '"' . $value . '"';
            }
        }

        $text = "INSERT INTO " . $table . " (" . $champs . ") VALUE ( " . $values . " )";

        try {
            $this->bdd->beginTransaction();
            $request = $this->bdd->query($text);
            $request->closeCursor();
            $this->lastId_user = $this->bdd->lastInsertId($table);
            $this->bdd->commit();
            return true;
        } catch (PDOException $e) {
            echo "L'enregistrement des informations a échoué:" . $e->getMessage();
            return false;
        }
    }

    /**
     * @author : andil Adebiyi
     * EditUserInfos est une methode qui modifie les informations de l'utilisateur dans m'inporte qu'elle table
     * @param  string : $table  Le nom de la table dans laquelle les informations seront inserer
     * @champ est un tableau qui a pour cle le nom des champs de la table de la base de donnee dont les valeurs correspond a celle qui seront
     * inserer
     * @param $checkby le nom du champs de vérification
     * @param $valueckec valeur correspondant au champs de vérifiaction
     * Ex: $table="user", $champs=["user_email"=>"12345@mail.com","user_name"=>andil,"user_lastName"=>"adebiyi"], $checkby="id",$valuechck='1'
     * @date : 11/10/2019
     * @return true  si tous c'est bien passer et l'exeption si il y a une erreur
     */
// j'ai modifié le nom en EditUserInfos
    public function EditUserInfos($table, $champ = array(), $checkby, $valueckeck) {
        $champs_value = "";
        $values = "";
        $var = 1;


        foreach ($champ as $key => $value) {

            if ($var == 1) {
                $value = str_replace('"', '\"', $value);
                $champs_value = $champs_value . $key . '="' . $value . '"';
                $var = $var + 1;
            } else {
                $value = str_replace('"', '\"', $value);
                $champs_value = $champs_value . ',' . $key . '="' . $value . '"';
            }
        }
        $text = "UPDATE " . $table . " SET " . $champs_value . " WHERE " . $checkby . " LIKE '" . $valueckeck . "'";

        try {

            $request = $this->bdd->query($text);
            $request->closeCursor();
            return true;
        } catch (PDOException $e) {
            echo "La mise a joure a échoué:" . $e->getMessage();
            return false;
        }
    }

    /**
     * @author : andil Adebiyi
     * DelUserInfos est une methode qui suprime les informations de l'utilisateur dans m'inporte qu'elle table
     * @param  string : $table  Le nom de la table dans laquelle les informations seront suprimer
     * @param $checkby le nom du champs de vérification
     * @param $valueckec valeur correspondant au champs de vérifiaction
     * @date : 11/10/2019
     * @return true  si tous c'est bien passer et l'exeption si il y a une erreur
     */
    public function DelUserInfos($table, $checkby, $valueckeck) {
        $text1 = "UPDATE $table SET status ='supprimer' ,
        edit_date= '.$this->getCurentimeAs('dateTime') WHERE $checkby LIKE $valueckeck";
        try {
            $request2 = $this->bdd->query($text1);
            $request2->closeCursor();
            return true;
        } catch (PDOException $e) {
            echo "La supression a joure a échoué:" . $e->getMessage();
            return false;
        }
    }

    /**
     * @author : Steven ABDOU
     * ifEntiterExistestNULL() est une methode qui compte les informations null de l'utilisateur dans m'inporte qu'elle table
     * @param  string : $table  Le nom de la table dans laquelle les informations seront suprimer
     * @param $checkby le nom du champs de vérification
     * @param $valueckec valeur correspondant au champs de vérifiaction
     * @date : 15/10/2019
     * @return No elles n'existe pas  et Yes si elle existe
     */
    public function ifEntiterExistestNULL($table, $checkby) {

        $text = "SELECT COUNT(*) FROM " . $table . " WHERE " . $checkby . " IS NULL ";
        $request = $this->bdd->query($text);
        $count = $request->fetchColumn();
        return $count;
    }



    /**
     * @author : andil Adebiyi
     * counts() est une methode qui compte  les entrer de  m'inporte qu'elle table
     * @param  string : $table  Le nom de la table dans laquelle les informations seront suprimer
     * @param $checkby le nom du champs de vérification
     * @param $valueckec valeur correspondant au champs de vérifiaction
     * @date : 11/10/2019
     * @return le nombre si tous vas bien et  l'exeption si il y a une erreur
     */
    public function counts($table, $checkby = null, $valcheck = null) {

        if (isset($checkby) && isset($valcheck)) {
            $text = "SELECT COUNT(*) FROM " . $table . " WHERE " . $checkby . " LIKE '" . $valcheck . "' AND status='créer'";
        } else {
            $text = "SELECT COUNT(*) FROM " . $table. " WHERE status='créer' ";
        }


        $request = $this->bdd->query($text);
        $count = $request->fetchColumn();
        return $count;
    }



    /**
     * @author : andil Adebiyi
     * getEntiter() est une methode qui prend les information dans n'importe qu'elle table  avec une limite
     * @param  string : $table  Le nom de la table dans laquelle les informations seront prise
     * @date : 11/10/2019
     * @return le nombre si tous vas bien et  l'exeption si il y a une erreur
     */
    public function getEntiterWhitlimit($table, $limite) {

        $text = "SELECT * FROM " . $table." WHERE  status='créer' LIMIT ".$limite;
        try {
            $request = $this->bdd->query($text);
            $entiter = $request->fetchAll();
            return $entiter;
        } catch (PDOException $e) {
            echo "Récuperation des informations  échoué:" . $e->getMessage();
            return false;
        }
    }
    /**
     * @author : andil Adebiyi
     * getEntiterUnique() est une methode qui prend les information dans n'importe qu'elle table
     * @param  string : $table  Le nom de la table dans laquelle les informations seront prise
     * @param $checkby le nom du champs de vérification
     * @param $valueckec valeur correspondant au champs de vérifiaction
     * @date : 11/10/2019
     * @return le nombre si tous vas bien et  l'exeption si il y a une erreur
     */
    public function getEntiterUnique($table, $checkby, $valcheck) {
        $text = "SELECT * FROM " . $table . " WHERE " . $checkby . " LIKE '" . $valcheck . "'  AND status='créer'";

        try {
            $request = $this->bdd->query($text);
            $entiter = $request->fetch();
            return $entiter;
        } catch (PDOException $e) {
            echo "Récuperation des informations  échoué:" . $e->getMessage();
            return false;
        }
    }


      /**
     * @author : andil Adebiyi
     * getEntiterM() est une methode qui prend les information dans n'importe qu'elle table en function d'un parametre
     * @param  string : $table  Le nom de la table dans laquelle les informations seront prise
     * @param $checkby le nom du champs de vérification
     * @param $valueckec valeur correspondant au champs de vérifiaction
     * @date : 11/10/2019
     * @return le nombre si tous vas bien et  l'exeption si il y a une erreur
     */
        public function getEntiterM($table, $checkby, $checkvalue, $orderby = "") {
        $test = "SELECT * FROM " . $table . " WHERE " . $checkby . " LIKE '" . $checkvalue . "'  AND status='créer'";
        if ($orderby)
            $test = $test . " ORDER BY " . $orderby;
        $request = $this->bdd->query($test);
        $RESULTAT = $request->fetchAll();
        $request->closeCursor();
        return $RESULTAT;
    }


        public function getUserInfos($table,$champ1,$value1,$champ2,$value2){

        $text="SELECT * FROM $table WHERE $champ1 LIKE '$value1' AND $champ2 LIKE '$value2' AND status='créer'";

        $request=$this->bdd->query($text);
        $resulta =  $request->fetch();
        $request->closeCursor();

        return $resulta;
    }

     public function getlasinsertId($table,$id){
        $text='SELECT MAX('.$id.') AS id FROM '.$table;
        $request = $this->bdd->query($text);
        $entiter = $request->fetch();
        return $entiter['id'];
     }

     public function getCurentimeAs($type){
        date_default_timezone_set('Africa/Porto-Novo');
        switch ($type) {
            case 'string':
                return $idfacture=date('y').date('m').date('d').date('H').date('i').date('s');
                break;
            case 'date':
                return $dateFormat = date("Y-m-d");
                break;
            case 'dateTime':
                return $dates=date('Y-m-d H:i:s');
                break;

            default:
                # code...
                break;
        }

     }


}
