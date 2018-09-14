<?php

namespace Controller;

use Framework\Controller;
use \Entity\Article;
use \Entity\Commentary;


class SingleController extends Controller
{
  //Affiche la page d'un seul article avec les commantaires
  public function singleAction($id)
  {
    //Cherche l'article corespondant a l'id
    $list = $this->getDoctrine()->getRepository("Entity\Article")->findAll();
    $art = $this->getDoctrine()->getRepository("Entity\Article")->find($id);

    return $this->render("single.html.twig",["article"=>$art, "articles"=>$list]);

  }

  //Enregiste un nouveau commentaire
  public function commentaryAction()
  {
    //Recupére Doctrine et Request
    $em = $this->getDoctrine();
    $request = $this->getRequest();

    //Crée un nouveau commentaire
    $commantary = new Commentary();

    //Recupére les variables transmise par le formulaire
    $pseudo = htmlspecialchars($request->request->get('pseudo'));
    $content = htmlspecialchars($request->request->get('content'));
    $idArticle = $request->request->get('idArticle');
    $idResponse = $request->request->get('idResponse');

    //Vérifie que le pseudo n'est pas vide sinon on lui met Anonyme
    if ($pseudo == "" || trim($pseudo) == ""){
      $pseudo = "Anonyme";
    }

    //Vérifie que le commentaire n'est pas vide
    if ($content != "" && trim($content) != "") {

        //Recupére l'article correspondant
        $art = $em->getRepository("Entity\Article")->find($idArticle);

        //On lie le commentaire à l'article
        $commantary->setArticle($art);

        //On lui attribut le niveau 0 (commentaire principal ce n'est pas une reponse)
        $commantary->setLvl(0);

        //On verifie si le commentaire a un parent
        //(Null si le formualire est envoyer depuis un nouveau commentaire et pas une reponse)
        if ($idResponse != "NULL") {

            //Recupére le commentaire Parent
            $com = $em->getRepository("Entity\Commentary")->find($idResponse);

            //On lie le commentaire au commentaire parent
            $commantary->setParent($com);

            //On lui attribut un niveau selon le commentaire parent
            $commantary->setLvl($com->getLvl()+1);
        }

        //On enregistre les données
        $commantary->setPseudo($pseudo);
        $commantary->setContent($content);
        $commantary->setDateCrea(new \DateTime());
        $commantary->setSignalment(0);

        $em->persist($commantary);
        $em->persist($art);
        $em->flush();

  //Si le commentaire et vide on affiche un message et on renvoi vers la page
  }else{
      $url = "/single/" . $idArticle . "#com";
      return $this->render("signal.html.twig",["url"=>$url, "comment"=>'no']);
  }

  //On affiche un message et on renvoi vers la page
    $url = "/single/" . $idArticle . "#com";
    return $this->render("signal.html.twig",["url"=>$url, "comment"=>'yes']);

  }

  //ajoute +1 à la valeur de signalement pour le commentaire
  public function signalingAction($id)
  {
    $em = $this->getDoctrine();
    $req = $this->getRequest()->request->get('signaler');
    $com = $em->getRepository("Entity\Commentary")->find($req);

    $valeur = $com->getSignalment();
    $ajout =  $valeur + 1;

    $com->setSignalment($ajout);

    $em->persist($com);
    $em->flush();

    $url = "/single/" . $id . "#com";
    return $this->render("signal.html.twig",["url"=>$url, "comment"=>'signal']);
  }
}
