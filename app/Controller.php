<?php
namespace Framework;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\RequestContext;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


class Controller
{
    private $twig;
    private $doctrine;
    private $request;
    private $routeName;
    private $routeCollection;

    public function __construct($request, $routeCollection, $config, $routeName)
    {

        $this->request = $request;
        $this->routeCollection = $routeCollection;
        $this->config= $config;

        //On charge twig
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../src/views');
        $this->twig = new \Twig_Environment($loader, array(
          'autoescape' => false,
            'cache' => false
        ));
        // paramètre de la base de donnée
        $dbParams = array(
            'driver'   => 'pdo_mysql',
            // 'host'     => $config["doctrine"]["host"],
            'user'     => $config["doctrine"]["user"],
            'password' => $config["doctrine"]["password"],
            'dbname'   => $config["doctrine"]["dbname"],
        );
        //Une configuration Doctrine est créé pour utiliser les annotations
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../src/entities"), false, __DIR__."/cache");

        //générer les classes proxy
        $config->setAutoGenerateProxyClasses(true);

        //Une nouvelle EntityManager est créé et configuré pour utiliser notre base de données et paramètres de doctrine.
        $this->doctrine = EntityManager::create($dbParams, $config);

    }

    protected function getRequest()
    {
        return $this->request;
    }

    protected function getConfig()
    {
        return $this->config;
    }

    protected function getDoctrine()
    {
        return $this->doctrine;
    }

    protected function render($filename,$data)
    {
        $template = $this->twig->load($filename);
        $response = new Response($template->render($data));
        $response->send();
    }

    protected function redirect($route,$args = array())
    {
        $context = new RequestContext();
        $generator = new UrlGenerator($this->routeCollection, $context);
        $url = $generator->generate($route,$args);
        $response = new RedirectResponse($url);
        $response->send();
    }

}
