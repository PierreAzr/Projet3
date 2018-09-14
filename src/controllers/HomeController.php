<?php

namespace Controller;

use Framework\Controller;
use \Entity\Article;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends Controller
{
    //Affiche la page accueil
    public function homeAction()
    {
        $list = $this->getDoctrine()->getRepository("Entity\Article")->findby(
                array(),
                array('number' => 'asc')
                );
        return $this->render("home.html.twig",["articles"=>$list]);
    }

    //Affiche la page info
    public function infoAction()
    {
      return $this->render("info.html.twig",[]);
    }

    //Affiche la page de connexion
    public function connectAction()
    {
      $request = $this->getRequest();


      if ($request->isMethod('post')) {

          //On récupère le mot de passe taper par l'utilisateur
          $password = $request->request->get('password');

          $password = $request->request->get('password');
          $passwordHash = hash('md5', $password);
          $config = $this->getConfig();

          //On vérifie le mot de passe taper par l'utilisateur
          if($passwordHash == $config["pass"]["pass"]){
              //On ajoute les variables à la session
              $request->getSession()->set('login', 1);
          }
          //on redirige vers la page d'administration
          return $this->redirect('admin');
      }else{
        return $this->render("connect.html.twig",[]);
      }
    }

    //Déconnecte la session
    public function endSessionAction()
    {
      $this->getRequest()->getSession()->invalidate();
      return $this->redirect('home');
    }
}
