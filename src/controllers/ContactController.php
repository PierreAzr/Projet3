<?php

namespace Controller;

use Framework\Controller;
use \Entity\Article;
use Symfony\Component\HttpFoundation\Session\Session;

class ContactController extends Controller
{

  //Affiche la page de contact
  public function contactAction()
  {
    return $this->render("contact.html.twig",[]);
  }

  //Verifie et envoi un mail
  public function contactSendAction(){

    $request = $this->getRequest();
    //On récupére les données transmises
    $name = $request->request->get('name');
    $email = $request->request->get('email');
    $subject= $request->request->get('subject');
    $text = $request->request->get('text');

    //On crée un tableau d'erreurs
    $errors = array();
    //On vérifie l'existence du champ et du contenu
    if( $name == '' || trim($name) == "") {
    $errors ['name'] = "vous n'avez pas renseigné votre nom";
    }
    if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
    $errors ['mail'] = "vous avez mal renseigné votre email";
    }
    if($subject == '' || trim($subject) == "") {
    $errors ['subject'] = "vous n'avez pas renseigné votre sujet";
    }
    if($text == '' || trim($text) == "") {
    $errors ['text'] = "vous n'avez pas renseigné votre message";
    }

    //Si il y'a une erreur on renvoi vers la page précédente avec le message d'erreur
    if(!empty($errors)){
      $error = 'yes';
    return $this->render("contact.html.twig",[
    "error"=>$error,
    "errors"=>$errors,
    "email"=>$email,
    "name"=>$name,
    "subject"=>$subject,
    "text"=>$text]);
    //Sinon on remplit le message du mail
    }else{
    $messageContent = '
    <table>
    <tr>
    <td><b>Emetteur du message:</b></td>
    </tr>
    <tr>
    <td>'. 'Message envoyé par ' . htmlspecialchars($name) .' - <i>' . htmlspecialchars($email) .'</i>' . '</td>
    </tr>
    <tr>
    <td><b>Contenu du message:</b></td>
    </tr>
    <tr>
    <td>'. htmlspecialchars($text) .'</td>
    </tr>
    </table>
    ';
    }

    //Paramètre pour le transport
    $transport = (new \Swift_SmtpTransport('smtp-forterocheblog.alwaysdata.net', 25))
    ->setUsername('forterocheblog@alwaysdata.net')
    ->setPassword('*******')
    ;

    //Instancie SwiftMailer
    $mailer = new \Swift_Mailer($transport);

   //Créer le message
    $message = (new \Swift_Message($subject))
      ->setFrom('Expediteur@mail.com')
      ->setTo('Destinataire@mail.com')
      ->setBody($messageContent,'text/html')
      ;

    //Envoi du mail
    $result = $mailer->send($message);

    //Affiche la page de confirmation et renvoi sur la page de contact
    $url = "/contact/";
    return $this->render("signal.html.twig",["url"=>$url, "comment"=>'mail']);;
      }

}
