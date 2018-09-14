<?php

namespace Framework;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\HttpFoundation\Session\Session;
use Framework\Config\Routes;

class App
{

    static public function run() {

        //Appel la fonction getRouteur
        $router = self::getRouter();

        //Sépare le nom du controller du nom de l'action
        list($controller,$action) = explode("::",array_shift($router["route"]));

        //On ajoute \Controler\ + Nom du controller
        $controller = "\Controller\\".$controller;
        //On crée un objet Request à partir des variables superglobales (tableaux): $_GET, $_POST, $_COOKIE, $_FILES and $_SERVER
        $request = Request::createFromGlobals();
        //Vérifie si une session existe et en crée une si ce n'est pas le cas
        if ($request->getSession() === null) {
            $request->setSession(new Session()); }
            $request->getSession()->start();

        //On crée une instance de l'objet controller (controller.php) qui a pour nom \Controler\ + Nom du controller
        $controller = new $controller($request, $router["collection"], self::loadConfig(), array_pop($router["route"]));
        //$router["route"] ne contient plus que les arguments (exemple l'id)
        //Car array_pop($router["route"] dépile et retourne le dernier élément du taleau $router["route"] qui est le nom de la route

        //Si la variable admin existe, on vérifie que la session et la variable login existe
        if(isset($router["route"]["admin"])){
          if (!($request->getSession()!= null && $request->getSession()->get('login'))){
            //Si la session et null ou login n'existe pas on renvoie vers la page de connexion
              $url = "/connect/";
              return header("Location: $url");
          }
          //On détruit la variable admin
          unset($router["route"]["admin"]);
      }

      //On rapelle la methode en ayant l'objet controller, le nom de l'action et les arguments de la route ($router["route"])
      call_user_func_array(array($controller,$action), $router["route"]);

    }

    static private function loadConfig()
    {
        $config = Yaml::parse(file_get_contents(__DIR__."/config/config.yml"));
        return $config;
    }

    static private function getRouter()
    {
        //On crée un objet Request à partir des variables superglobales
        $request = Request::createFromGlobals();
        $context = new Routing\RequestContext();
        $context->fromRequest($request);
        //Charge le fichier config
        $locator = new FileLocator(array(__DIR__."/config"));
        //Charge le router avec Yaml pour les annotations et le fichier contenant les routes
        $router = new Routing\Router(
            new Routing\Loader\YamlFileLoader($locator),
            'routing.yml',
            array(),
            $context
        );

        //Match permet de trouver la route correspond au chemin
        //getRouteCollection liste toutes les Routes
        return array("route"=>$router->match($request->getPathInfo()),"collection"=> $router->getRouteCollection());
    }
}
