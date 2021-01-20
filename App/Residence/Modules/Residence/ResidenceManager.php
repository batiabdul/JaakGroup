<?php

class LocationFrontManager extends Managers
{
  protected $bdd;
 
  public function __construct($bdd)
  {
    $this->bdd = $bdd;

  }


  public function GetAllOptionOf($table,$array=null){
 			$htmlselect="";
 			$id_user=$_SESSION['user']['user_id_unique'];
            switch ($table) {
                case 'maison':
                       $INFOS=$this->getEntiterM('maison', 'id_user', $id_user);
                        foreach ($INFOS as $infos ) {
                          $htmlselect=$htmlselect.'<option value="'.$infos['maison_id_unique'].'" >'.$infos['nom'].'</option>';
                        }
                    break;
                case 'maisonUnique':
                       $infos=$this->getEntiterUnique('maison', 'maison_id_unique',$array['id'] );

                          $htmlselect=$htmlselect.'<option value="'.$infos['maison_id_unique'].'" >'.$infos['nom'].'</option>';
                    break;
                case'type_chambre':
                     $INFOS=$this->getEntiter('type_chambre');
                        foreach ($INFOS as $infos ) {
                          $htmlselect=$htmlselect.'<option value="'.$infos['tc_id_unique'].'" >'.$infos['type'].'</option>';
                        }
                    break;
                case 'type_chambreUnique':
                       $infos=$this->getEntiterUnique('type_chambre', 'tc_id_unique', $array['id']);

                          $htmlselect=$htmlselect.'<option value="'.$infos['tc_id_unique'].'" >'.$infos[' 	type'].'</option>';
                    break;
                case'chambre':
                     $INFOS=$this->getEntiterM('chambre','id_user', $id_user);
                        foreach ($INFOS as $infos ) {
                          $htmlselect=$htmlselect.'<option value="'.$infos['chambre_id_unique'].'" >'.$infos['chambre'].'</option>';
                        }
                    break;
                case 'chambreUnique':

                       $infos=$this->getEntiterUnique('chambre', 'chambre_id_unique', $array['id']);

                          $htmlselect=$htmlselect.'<option value="'.$infos['chambre_id_unique'].'" >'.$infos['chambre'].'</option>';
                    break;
                case'locataire':
                     $INFOS=$this->getEntiterM('locataire','id_user', $id_user);
                        foreach ($INFOS as $infos ) {
                          $htmlselect=$htmlselect.'<option value="'.$infos['locataire_id_unique'].'" >'.$infos['nom'].' '.$infos['prenom'].'</option>';
                        }
                    break;

                case 'locataireUnique':
                      
                       $infos=$this->getEntiterUnique('locataire','locataire_id_unique',$array['id']);

                          $htmlselect=$htmlselect.'<option value="'.$infos['locataire_id_unique'].'" >'.$infos['nom'].' '.$infos['prenom'].'</option>';
                    break;
                case 'type_payement':
                   $INFOS=$this->getEntiter('type_payement');
                        foreach ($INFOS as $infos ) {
                          $htmlselect=$htmlselect.'<option value="'.$infos['Tp_id_unique'].'" >'.$infos['type'].'</option>';
                        }
                  break;
                case 'type_payementUnique':
                   $infos=$this->getEntiterUnique('type_payement','Tp_id_unique',$array['id']);
                          $htmlselect=$htmlselect.'<option value="'.$infos['Tp_id_unique'].'" >'.$infos['type'].'</option>';
                  break;
                default:
                    # code...
                    break;
            }


           return $htmlselect;
  }

  public function GetTableOf($table,$array=null){

      $htmltable="";
      $id_user=$_SESSION['user']['user_id_unique'];
            switch ($table) {
                case 'maison':
                       $INFOS=$this->getEntiterM('maison', 'id_user', $id_user);
                       $i=0;
                        foreach ($INFOS as $infos ) {
                          $i=$i+1;
                          $htmltable=$htmltable.'<tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$infos['nom'].'</td>
                                                    <td>'.$infos['adresse'].'</td>
                                                    <td>'.$infos['nbr_de_chbr'].'</td>
                                                    <td>
                                                      <a href="/GestionMaison/Form/Maison/Edit/'.$infos['maison_id_unique'].' " class="btn btn-secondary" >
                                                        <i class="fas fa-edit fa-fw"></i></a> | 
                                                       <form action="/Ajax.php" method="POST" style="display: inline;">
                                                          <input type="text" name="cle" value="del" hidden>
                                                          <input type="text" name="valeur" value="maison_id_unique" hidden>
                                                          <input type="text" name="goto" value="/GestionMaison/Rapport/Maisons" hidden>
                                                          <input type="text" name="id" value="'.$infos['maison_id_unique'].'" hidden>
                                                          <input type="text" name="tb" value="maison" hidden>
                                                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></button></form></td>
                                                  </tr>';
                        }
                    break;
            case 'chambre':
                    $INFOS=$this->getEntiterM('chambre', 'id_user', $id_user);
                       $i=0;
                    foreach ($INFOS as $infos ) {
                          $i=$i+1;
                          $maison=$this->getEntiterUnique('maison', 'maison_id_unique', $infos['maison_id_maison']);
                          $type_chambre=$this->getEntiterUnique('type_chambre', 'tc_id_unique', $infos['id_type_de_chbr']);
                          $htmltable=$htmltable.'<tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$maison['nom'].'</td>
                                                    <td>'.$infos['chambre'].'</td>
                                                    <td>'.$type_chambre['type'].'</td>
                                                    <td>'.$infos['autre_type_chbr'].'</td>
                                                    <td>'.$infos['prix_chbr'].' FCFA</td>
                                                    <td>'.$infos['numero_police_eau'].'</td>
                                                    <td>'.$infos['numero_police_electricite'].'</td>
                                                    <td>
                                                      <a href="/GestionMaison/Form/Chambres/Edit/'.$infos['chambre_id_unique'].' " class="btn btn-secondary" >
                                                        <i class="fas fa-edit fa-fw"></i></a> | 
                                                        <form action="/Ajax.php" method="POST" style="display: inline;">
                                                          <input type="text" name="cle" value="del" hidden>
                                                          <input type="text" name="valeur" value="chambre_id_unique" hidden>
                                                          <input type="text" name="goto" value="/GestionMaison/Rapport/Chambres" hidden>
                                                          <input type="text" name="id" value="'.$infos['chambre_id_unique'].'" hidden>
                                                          <input type="text" name="tb" value="chambre" hidden>
                                                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></button></form></td>
                                                  </tr>';
                        }
              break;
            case 'chambreLibre':
                    $INFOS=$this->GetChambreLibrePour('TouteMaison');
                   $i=0;
                    foreach ($INFOS as $infos ) {
                          $i=$i+1;
                          $maison=$this->getEntiterUnique('maison', 'maison_id_unique', $infos['maison_id_maison']);
                          $type_chambre=$this->getEntiterUnique('type_chambre', 'tc_id_unique', $infos['id_type_de_chbr']);
                          $htmltable=$htmltable.'<tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$maison['nom'].'</td>
                                                    <td>'.$infos['chambre'].'</td>
                                                    <td>'.$type_chambre['type'].'</td>
                                                    <td>'.$infos['autre_type_chbr'].'</td>
                                                    <td>'.$infos['numero_police_eau'].'</td>
                                                    <td>'.$infos['numero_police_electricite'].'</td>
                                                    <td>
                                                      <a href="/GestionMaison/Form/Chambres/Edit/'.$infos['chambre_id_unique'].' " class="btn btn-secondary" >
                                                        <i class="fas fa-edit fa-fw"></i></a> | 
                                                        <form action="/Ajax.php" method="POST" style="display: inline;">
                                                          <input type="text" name="cle" value="del" hidden>
                                                          <input type="text" name="valeur" value="chambre_id_unique" hidden>
                                                          <input type="text" name="goto" value="/GestionMaison/Rapport/ChambresLibre" hidden>

                                                          <input type="text" name="id" value="'.$infos['chambre_id_unique'].'" hidden>
                                                          <input type="text" name="tb" value="chambre" hidden>
                                                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></button></form></td>
                                                  </tr>';
                        }
              break;
              
            case 'locataire':
              $INFOS=$this->getEntiterM('locataire', 'id_user', $id_user);
                       $i=0;
                        foreach ($INFOS as $infos ) {
                          $i=$i+1; 
                          $htmltable=$htmltable.'<tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$infos['nom'].'</td>
                                                    <td>'.$infos['prenom'].'</td>
                                                    <td>'.$infos['numero'].'</td>
                                                    <td>'.$infos['adresse'].'</td>
                                                    <td><a href="/GestionMaison/Form/Louer/Louer/'.$infos['locataire_id_unique'].'" class="btn btn-primary">
                                                        Louer </a></td>
                                                    <td>
                                                      <a href="/GestionMaison/Form/Locataires/Edit/'.$infos['locataire_id_unique'].' " class="btn btn-secondary" >
                                                        <i class="fas fa-edit fa-fw"></i></a> | 
                                                        <form action="/Ajax.php" method="POST" style="display: inline;">
                                                          <input type="text" name="cle" value="del" hidden>
                                                          <input type="text" name="valeur" value="locataire_id_unique" hidden>
                                                          <input type="text" name="goto" value="/GestionMaison/Rapport/Locataires" hidden>
                                                          <input type="text" name="id" value="'.$infos['locataire_id_unique'].'" hidden>
                                                          <input type="text" name="tb" value="locataire" hidden>
                                                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></button></form></td>
                                                  </tr>';

                        }
              break;
              case 'TableLocataireAvecChambre':
              $INFOS=$this->getEntiterM('locataire_has_chambre', 'id_user', $id_user);
             
              
                       $i=0;
                        foreach ($INFOS as $infos ) {
                           $locataire=$this->getEntiterUnique('locataire', 'locataire_id_unique', $infos['id_locataire']);
                            $chambre=$this->getEntiterUnique('chambre', 'chambre_id_unique', $infos['id_chambre']);
                            $type_chambre=$this->getEntiterUnique('type_chambre', 'tc_id_unique', $chambre['id_type_de_chbr']);

                             setlocale (LC_TIME, 'fr','fr_FR','fr_FR@euro','fr_FR.utf8','fr-FR','fra');
                      $date_debut=utf8_encode(strftime("%d %B %Y",strtotime($infos['date_debut'])));
                      $date_fin=utf8_encode(strftime("%d %B %Y",strtotime($infos['date_fin'])));
                           
                          $i=$i+1; 
                          $htmltable=$htmltable.'<tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$locataire['nom'].'</td>
                                                    <td>'.$locataire['prenom'].'</td>
                                                    <td>'.$locataire['numero'].'</td>
                                                    <td>'.$locataire['adresse'].'</td>
                                                    <td>'.$chambre['chambre'].'</td>
                                                    <td>'.$type_chambre['type'].'</td>
                                                    <td>'.$date_debut.'</td>
                                                    <td>'.$date_fin.'</td>
                                                    <td>
                                                      <a href="/GestionMaison/Form/Louer/Edit/'.$infos['louer_id_unique'].' " class="btn btn-secondary" >
                                                        <i class="fas fa-edit fa-fw"></i></a> | 
                                                        <form action="/Ajax.php" method="POST" style="display: inline;">
                                                          <input type="text" name="cle" value="del" hidden>
                                                          <input type="text" name="valeur" value="louer_id_unique" hidden>
                                                          <input type="text" name="goto" value="/GestionMaison/Rapport/Tous_Locataires_Avec_Chambre" hidden>
                                                          <input type="text" name="id" value="'.$infos['louer_id_unique'].'" hidden>
                                                          <input type="text" name="tb" value="locataire_has_chambre" hidden>
                                                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></button></form></td>
                                                  </tr>';

                        }
              break;
             case 'locataireEndette':
              $INFOS=$this->getLocataireEn("Dette",$array['type_payement']);
            
              
                       $i=0;
                       $htmltable="";
                       
                        foreach ($INFOS as $infos ) {
                       

                             $i=$i+1; 
                          $locataire=$this->getEntiterUnique('locataire', 'locataire_id_unique', $infos['id_locataire']);
                          $Location=$this->getEntiterUnique('locataire_has_chambre', 'id_locataire', $infos['id_locataire']);
                          $chambre=$this->getEntiterUnique('chambre', 'chambre_id_unique', $Location['id_chambre']);

                          $maison=$this->getEntiterUnique('maison', 'maison_id_unique', $chambre['maison_id_maison']);
                          $type_chambre=$this->getEntiterUnique('type_chambre', 'tc_id_unique', $chambre['id_type_de_chbr']);
                          $detailDette=$this->GetMontantRegulariser(['id_chambre'=>$Location['id_chambre'],'id_locataire'=>$infos['id_locataire'],'id_typeloyer'=>$array['type_payement']]);
                          $listeMoisNonpayéTotalité="";

                            foreach ($detailDette['moi'] as $moiNonpayer) { 
                                $listeMoisNonpayéTotalité=$listeMoisNonpayéTotalité."<li>".$moiNonpayer."</li>";
                            }

                            $moisNompayer=$this->GetMoiNonPayer($infos['id_locataire'],$array['type_payement'],$Location['id_chambre']);
 
                           $listeMoisNonpayé="";
                           $montant=(int)$detailDette['montant']+(int)$moisNompayer['chambreprix'];
                           unset($moisNompayer['chambreprix']);

                            foreach ($moisNompayer as $moiNonpayer) { 
                                $listeMoisNonpayé=$listeMoisNonpayé."<li>".$moiNonpayer."</li>";
                            }


                            if ($montant>0) {
                              $htmltable=$htmltable.'<tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$locataire['nom'].' '.$locataire['prenom'].'</td>
                                                    <td>'.$chambre['chambre'].'</td>
                                                    <td>'.$type_chambre['type'].'</td>
                                                    <td>'.$maison['nom'].'</td>
                                                    <td >
                                                    <div class="">
                                                    <span class="" style="font-size:14px;"
                                                     >
                                                    '.$montant.' FCFA 
                                                    </span>
                                                    <button class=" btn btn-primary detailDEtte "  data-idchambre="'.$Location['id_chambre'].'"  data-idlocataire="'.$locataire['locataire_id_unique'].'" data-typepayement="'.$array['type_payement'].'"
                                                    > Détail</button>
                                                    </div>

                                                    </td>
                                                    <td>
                                                      <ul>
                                                      '.$listeMoisNonpayéTotalité.'
                                                      </ul>

                                                    </td>
                                                     <td>
                                                      <ul>
                                                      '.$listeMoisNonpayé.'
                                                      </ul>

                                                    </td>
                                                    <td><a href="/GestionMaison/Form/Payement/'.$array['louervaleur'].'/'.$locataire['locataire_id_unique'].' " class="btn btn-primary" >
                                                        Payer</a></td>
                                                  </tr>';
                            }


                          
                         
                         
                        }
              break;

            case 'TousLesPayement':
                    $INFOS=$this->getEntiterM('payement', 'id_user', $id_user);
                       $i=0;
                    foreach ($INFOS as $infos ) {
                       setlocale (LC_TIME, 'fr','fr_FR','fr_FR@euro','fr_FR.utf8','fr-FR','fra');
                      $date_payement=utf8_encode(strftime("%d %B %Y",strtotime($infos['creat_date'])));
                          $i=$i+1;
                          $chambre=$this->getEntiterUnique('chambre', 'chambre_id_unique', $infos['id_chambre']);
                          $maison=$this->getEntiterUnique('maison', 'maison_id_unique', $chambre['maison_id_maison']);
                          $locataire=$this->getEntiterUnique('locataire', 'locataire_id_unique', $infos['id_locataire']);
                          $type_payement=$this->getEntiterUnique('type_payement', 'tp_id_unique', $infos['id_type']); 
                          $htmltable=$htmltable.'<tr>
                                                    <td>'.$i.'</td>
                                                      <td>'.$type_payement['type'].'</td>
                                                      <td>'.$locataire['nom'].' '.$locataire['prenom'].'</td>
                                                      <td>'.$chambre['chambre'].'</td>
                                                      <td>'.$maison['nom'].'</td>
                                                      <td>'.$infos['ref_payment'].'</td>
                                                      <td>'.$infos['document'].'</td>
                                                      <td>'.$infos['montant'].'</td>
                                                      <td>'.$infos['moi_de_payement'].' </td>
                                                      <td>'.$date_payement.'</td>
                                                    <td class="aceuill">
                                                      <a href="/GestionMaison/Form/Payement/Edit/'.$infos['payement_id_unique'].' " class="btn btn-secondary" >
                                                        <i class="fas fa-edit fa-fw"></i></a> | 
                                                        <form action="/Ajax.php" method="POST" style="display: inline;">
                                                          <input type="text" name="cle" value="del" hidden>
                                                          <input type="text" name="goto" value="/GestionMaison/Rapport/Tous_Les_Payements" hidden>
                                                          <input type="text" name="valeur" value="payement_id_unique" hidden>
                                                          <input type="text" name="id" value="'.$infos['payement_id_unique'].'" 
                                                          hidden>
                                                          <input type="text" name="tb" value="payement" hidden>
                                                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></button></form></td>
                                                  </tr>';
                        }
              # code...
              break;

                default:
                  # code...
                  break;
    }
    return $htmltable; 
  }


  public function GetChambreLibrePour($valeur,$idmaison=null){
    $datenow = date("Y-m-d");
    $ChambresLibre=[];
    $id_user=$_SESSION['user']['user_id_unique'];


        switch ($valeur){
          case 'UneMaison':
            $textRequest="SELECT CB.chambre,CB.chambre_id_unique,LC.date_fin,CB.maison_id_maison FROM locataire_has_chambre AS LC 
                          RIGHT JOIN chambre AS CB 
                          ON LC.id_chambre =CB.chambre_id_unique
                          WHERE (  ( SELECT MAX(date_fin) FROM locataire_has_chambre WHERE id_chambre = LC.id_chambre)  < '".$datenow."' OR LC.date_fin IS NULL ) AND CB.maison_id_maison=".$idmaison;
                 $request=$this->bdd->query($textRequest);
                 $ChambresLibre =  $request->fetchAll();
            
            break;
          case 'TouteMaison':
               $textRequest="SELECT CB.chambre,CB.chambre_id_unique,CB.autre_type_chbr,CB.numero_police_eau,CB.numero_police_electricite,CB.id_type_de_chbr,LC.date_fin,CB.maison_id_maison FROM locataire_has_chambre AS LC 
                          RIGHT JOIN chambre AS CB 
                          ON LC.id_chambre =CB.chambre_id_unique
                          WHERE CB.id_user=$id_user AND (( SELECT MAX(date_fin) FROM locataire_has_chambre WHERE id_chambre = LC.id_chambre)  < '".$datenow."' OR LC.date_fin IS NULL) ";
                 $request=$this->bdd->query($textRequest);
                 $ChambresLibre =  $request->fetchAll();
            break;
          
          default:
            # code...
            break;
        }

        return $ChambresLibre;

  } 




 public function getLocataireEn($type,$type_payement){
  date_default_timezone_set('Africa/Porto-Novo');
  $dateNow= date("Y-m-d",strtotime("last day of previous month"));

    $totaliter=($type=='Dette')?0:1;
    $id_user=$_SESSION['user']['user_id_unique'];
    
   $textRequest="SELECT * FROM payement AS P  WHERE  P.id_user=".$id_user." AND  (  ( SELECT MAX(date_payement) FROM payement WHERE id_locataire = P.id_locataire AND id_type=".$type_payement." ) < '".$dateNow."' AND P.id_type=".$type_payement.") OR  (P.totaliter= '".$totaliter."' AND P.id_type=".$type_payement.")  GROUP BY P.id_locataire";
 
    $request=$this->bdd->query($textRequest);
    $payement =  $request->fetchAll();
    return $payement;

 }

 public function GetMoiNonPayer($idLocataire,$type_payement,$idchambrer){
    $chambre=$this->getEntiterUnique('chambre', 'chambre_id_unique', $idchambrer);
    $prixChmbre= (int)$chambre['prix_chbr'];
    $Prixtotale=0;
  date_default_timezone_set('Africa/Porto-Novo');
  $dateNow= date("Y-m-d",strtotime("last day of  this month"));

    $textRequest="SELECT MAX(date_payement) AS derniermoi FROM payement WHERE id_locataire = ".$idLocataire." AND id_type=".$type_payement;
    $request=$this->bdd->query($textRequest);
    $Mois =  $request->fetch();
    $derniermoi=$Mois['derniermoi'];

    $MOISENDETTE=[];
    
    
      $end    = new DateTime($dateNow);
      $pre_payer='last day of last month';
      $poste_payer='first day of next  month';
      $infosPrepayerOrNot=($_SESSION['parametreUser']['post_payer']=='false')? $pre_payer:$poste_payer;
    
     // $end->modify('first day of next  month');last day of last month
      $end->modify($infosPrepayerOrNot);   

      $start    = new DateTime($derniermoi);
      $start->modify('first day of next month');

      $interval = DateInterval::createFromDateString('1 month');
      $period   = new DatePeriod($start, $interval, $end);

      foreach ($period as $dt) {
        setlocale (LC_TIME, 'fr','fr_FR','fr_FR@euro','fr_FR.utf8','fr-FR','fra');
        $moi=utf8_encode(strftime("%B/%g",strtotime($dt->format("Y-m"))));
        $MOISENDETTE[$moi]=$moi;  
        $Prixtotale=$Prixtotale+(int)$chambre['prix_chbr'];
      }

        $MOISENDETTE['chambreprix']=$Prixtotale;


      return $MOISENDETTE;

 }
   
  public function GetMontantRegulariser($array){
    $totale=0;
    $moi=[];
    $chambre=$this->getEntiterUnique('chambre', 'chambre_id_unique', $array['id_chambre']);
    $prixChmbre= (int)$chambre['prix_chbr'];

    $textRequest="SELECT moi_de_payement,montant FROM payement WHERE  id_locataire=".$array['id_locataire']." AND  id_type=".$array['id_typeloyer']." AND totaliter=0 ORDER BY moi_de_payement DESC ";
    $request=$this->bdd->query($textRequest);
    $payement =  $request->fetchAll();

   
    foreach ($payement as  $value) {
        $prixPayer=(int)$value['montant'];
      if ($prixChmbre>$prixPayer) {
         $resteApayer=(int)$prixChmbre- (int)$prixPayer;
        $totale=$totale+$resteApayer;
        $moi[$value['moi_de_payement']]=$value['moi_de_payement'];
      }
     
    }

    return ['montant'=>$totale,'moi'=>$moi];
  }

  public function GetMontantRegulariserDetail($array){
    $detailDEtte=[];
    $totale=0;
    
    $chambre=$this->getEntiterUnique('chambre', 'chambre_id_unique', $array['id_chambre']);
    $prixChmbre= (int)$chambre['prix_chbr'];

    $textRequest="SELECT moi_de_payement,montant FROM payement WHERE  id_locataire='".$array['id_locataire']."' AND  id_type='".$array['id_typeloyer']."' AND totaliter=0 ORDER BY moi_de_payement DESC ";
    $request=$this->bdd->query($textRequest);
    $payement =  $request->fetchAll();

   
    foreach ($payement as  $value) {
        $prixPayer=(int)$value['montant'];
         $moi=[];
      if ($prixChmbre>$prixPayer) {
        $resteApayer=(int)$prixChmbre- (int)$prixPayer;
        $totale=$totale+$resteApayer;
        $moi['moi']=$value['moi_de_payement'];
        $moi['prixRestant']=$resteApayer;
        $moi['payer']=$prixPayer;
        array_push($detailDEtte,$moi);
      }
     
    }
    return $detailDEtte;
  }



  public function PayementExiste($array){


    $textRequest="SELECT * FROM payement WHERE  id_locataire='".$array['id_locataire']."' AND  id_type='".$array['id_typeloyer']."' AND id_chambre='".$array['id_chambre']."'  AND moi_de_payement = '".$array['moiAnnee']."'";
    $request=$this->bdd->query($textRequest);
    $payement =  $request->fetch();

    if (empty($payement)) {
      return false;
    }else{
      return $payement;
    }
  }

}


              