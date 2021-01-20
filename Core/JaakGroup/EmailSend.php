<?php
/**
 * @license Kits License
 * @author Andil ADEBIYI <andiladebiyi@gmail.com>
 * @Copyright (c) kits, 2019
 */
//namespace Kits;
require 'lib/email/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 class EmailSend
{

	private $email;
	private $kitmass;
	private $bdd;

  public function __construct()
  { 
  	$this->bdd = Database::connect();
    $this->kitmass=new Managers($this->bdd);
  	$this->mail = new PHPMailer;
    $this->mail->CharSet = "UTF-8";
    $this->mail->isHTML(true);
    $this->mail->isSMTP();
    $this->mail->Debugoutput = 'html';
    $this->mail->Port = 465;
    $this->mail->SMTPSecure = 'ssl';
    $this->mail->SMTPAuth = true;
    // $this->mail->Host = 'mail12.lwspanel.com';
    $this->mail->Host = 'mail.kitsmass.com';
    // $this->mail->SMTPDebug = 1; 


  }
  
  public function SendCommand($array){
  					$pays=$this->kitmass->getEntiterUnique('country','id_country', trim(htmlentities($array['country'])));
				$Titre= '';
				$Nom= trim(htmlentities($array['firstname']));
				$Prénom= trim(htmlentities($array['lastname']));
				$Numéro= trim(htmlentities($array['telephone']));
				$Email= trim(htmlentities($array['email2']));
				$totale= trim(htmlentities($array['totale']));
				$Adresse= $pays['country'].','.trim(htmlentities($array['address1'])).','.trim(htmlentities($array['city'])); 
				$Adresselivraison= trim(htmlentities($array['city']));

				$IDS=$array['idarticle'];



				$template=file_get_contents('data/mail/email.html');
				$template=str_replace('{nomPrenom}',$Nom.' '.$Prénom, $template);
				$template=str_replace('{Numéro}',$Numéro, $template);
				$template=str_replace('{lieuxLivraison}',$Adresselivraison, $template);
				$template=str_replace('{TOTAL}',$totale.' FCFA', $template);

				$htmlarticle='';
				

		          $article= $this->kitmass->getEntiterUnique('article', 'id_article', $IDS);
		                $img=explode(';',$article['article_picture'] );
		                $image1=$img[0];

		            $id_article=$article['id_article'];

					$htmlarticle=$htmlarticle.'<tr>
					<td>
						<img style="width: 100px;height: 100px;" src="http://kitsmass.com/Web/img/produit/'.$image1.'" alt="'.$article['article'].'">
					</td>
					<td>
						'.$article['article'].'
					</td>
					<td>
						'.trim(htmlentities($array[$id_article])).'
					</td>
					<td>
						'.$article['price'].'
					</td>

				</tr>';		
				              $champ=[
              			'id_article'=>$id_article,
              			'nomprenom'	=>$Nom.' '.$Prénom,
              			'adresse' =>$Adresselivraison,
              			'numero'=>$Numéro,
              			'pays'=>$pays['country'],
              			'boutique'=>$article['id_shop'],
              			'quantite'=>trim(htmlentities($array[$id_article])),
              			'date'	=> $datenow	  	 	 

              			];
              $this->kitmass->AddUserInfos('commande', $champ );		
				

			  $template=str_replace('{bodytable}',$htmlarticle, $template);
              $this->mail->Subject = 'Votre commande sur Kitsmass';
              $this->mail->setFrom('commande@kitsmass.com', 'KITSMASS');
   			      $this->mail->Username = 'commande@kitsmass.com';
    		      $this->mail->Password = 'vM6@78$hBZ';
              $this->mail->addAddress($Email);
              $this->mail->Body = $template;
              $this->mail->Send();
  } 

  public function SendContact($array){
  				$nom=$array['nom'];
  				$email=$array['email'];
  				$message=$array['message'];
  				$template='<div> 
  							<span>Nom: '. $nom.'</span> <br>
  							<span>Email: '. $email.'</span> <br>
  							<p>'.$message.'</p>
  						  </div>';
              $this->mail->setFrom('serviceclient@kitsmass.com', 'KITSMASS');
              $this->mail->Subject = 'Contact';
   			      $this->mail->Username = 'serviceclient@kitsmass.com';
    		      $this->mail->Password = 'LAB8C37ku6hq';
              $this->mail->addAddress('serviceclient@kitsmass.com');
              $this->mail->Body = $template;
              $this->mail->Send();

  }



  public function sendWelcommeEmail($array){
            $template=file_get_contents('data/mail/emailBoutique.html');
            $numero=$array['telephone'];
            $lien='https://kitsmass.com/Maboutique';
            $email=$array['email'];
            $mdp=$array['motdepass'];
            $email=$array['email'];
            $template=str_replace('{numero}',$numero, $template);
            $template=str_replace('{lien}',$lien, $template);
            $template=str_replace('{email}',$email, $template);
            $template=str_replace('{motdepasse}',$mdp, $template);
            $this->mail->setFrom('serviceclient@kitsmass.com', 'KITSMASS');

            $this->mail->Subject = 'BOUTQUE KITSMASS';
            $this->mail->Username = 'serviceclient@kitsmass.com';
            $this->mail->Password = 'LAB8C37ku6hq';
            $this->mail->addAddress($email);
            $this->mail->Body = $template;
            $this->mail->Send();
    

  }

}