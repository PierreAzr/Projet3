<?php

namespace Controller;

use Framework\Controller;
use \Entity\Article;

class AdminController extends Controller
{

    //Affiche la page administrateur
    public function adminAction()
    {
      $em = $this->getDoctrine();
      $list = $em->getRepository("Entity\Article")->findAll();
      $com =  $em->getRepository("Entity\Commentary")->findBy(
        array(),
        array('signalment' => 'desc'),
        5,
        0
        );

      return $this->render("admin.html.twig",["articles"=>$list,"comment"=>$com]);
    }

    //Permet d'afficher la page pour créer un nouvel article
    public function newAction()
    {
      $em = $this->getDoctrine();
      $request = $this->getRequest();

      $article = $request->request->get('article');
      $arts = $em->getRepository("Entity\Article")->findAll();

      return $this->render("adminMod.html.twig",["articles"=>$arts]);
    }

    //Enregistre dans la base de donnée un nouvel article
    public function newArtAction()
    {
      $article = new Article();
      $em = $this->getDoctrine();
      $request = $this->getRequest();

      $title = $request->request->get('title');
      $content = $request->request->get('content');
      $number = $request->request->get('number');
      $date = new \DateTime();

      $article->setDateArt($date);
      $article->setNumber($number);
      $article->setTitle($title);
      $article->setContent($content);

      $em->persist($article);
      $em->flush();

      return $this->redirect('admin');
    }

    //Permet d'afficher la page d'un article pour le modifier
    public function modAction()
    {

      $em = $this->getDoctrine();
      $request = $this->getRequest();

      $article = $this->getRequest()->request->get('article');
      $art = $em->getRepository("Entity\Article")->find($article);
      $arts = $em->getRepository("Entity\Article")->findAll();

      return $this->render("adminMod.html.twig",["article"=>$art, "articles"=>$arts]);
    }

    //Enregistre dans la base de donnée les modifications apporté a l'article
    public function modArtAction()
    {
      $em = $this->getDoctrine();
      $request = $this->getRequest();

      $req = $request->request->get('idArticle');

      $title = $request->request->get('title');
      $content = $request->request->get('content');
      $number = $request->request->get('number');

      $errors = array();
      //On vérifie l'existence du champ et du contenu
      if($title == '' || ltrim($title, "&nbsp;") == "") {
      $errors ['title'] = "vous n'avez pas renseigné le titre";
      }
      if($content == '' || ltrim($content, "&nbsp;") == "") {
      $errors ['content'] = "vous n'avez pas renseigné le contenu";
      }
      if($number == '' || trim($number) == "") {
      $errors ['number'] = "vous n'avez pas renseigné le numéro du chapitre";
      }

      //Si il y'a une erreur on renvoi vers la page précédente avec le message d'erreur
      if(!empty($errors)){
        $error = 'yes';
      return $this->render("adminMod.html.twig",[
      "error"=>$error,
      "errors"=>$errors,
      "title"=>$title,
      "content"=>$content,
      "number"=>$number]);
      //Sinon on remplit le message du mail
      }

      if ($req == null) {
        $article = new Article();
      }else {
        $article = $em->getRepository("Entity\Article")->find($req);
      }

      $date = new \DateTime();

      $article->setTitle($title);
      $article->setContent($content);
      $article->setNumber($number);
      $article->setDateArt($date);

      $em->persist($article);
      $em->flush();

      $url = "/admin/";
      return header("Location: $url");
    }

    //Supprime un article et les commentaires qui lui sont liés
    public function deleadArtAction()
    {
      $em = $this->getDoctrine();
      $req = $this->getRequest()->request->get('remove');
      $art = $em->getRepository("Entity\Article")->findOneBy(
        array('id' => $req)
      );
      //Suppression de tous les commentaires liés à l'article
      foreach ($art->getComments() as $value) {
        $art->removeComments($value);
      }

      $em->remove($art);
      $em->flush();
      $url = "/admin/";
      return header("Location: $url");
    }

    //Supprime un commentaire et tous ses commentaires enfants
    public function deleadComAction()
    {
      $em = $this->getDoctrine();
      $req = $this->getRequest()->request->get('report');

      $com = $em->getRepository("Entity\Commentary")->findOneBy(
        array('id' => $req)
      );

        foreach ($com->getChildren() as $value) {
          $com->removeChildren($value);
        }

      $em->remove($com);
      $em->flush();

      $url = "/admin/";
      return header("Location: $url");
    }

    //Supprime un commentaire et tous ses commentaires enfants
    public function signalComAction()
    {
      $em = $this->getDoctrine();
      $req = $this->getRequest()->request->get('report');

      $com = $em->getRepository("Entity\Commentary")->findOneBy(
        array('id' => $req)
      );

      $com->setSignalment(0);
      $em->persist($com);
      $em->flush();

      $url = "/admin/";
      return header("Location: $url");
    }
}
