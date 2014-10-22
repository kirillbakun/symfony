<?php

namespace Application\MainBundle\Controller;

use Application\MainBundle\Manager\ArticleManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('ApplicationMainBundle:Article');

        $entity_repository = $this->getDoctrine()->getRepository('ApplicationMainBundle:Article');
        $articles = $entity_repository->findAll();

        return $this->render('ApplicationMainBundle:Default:index.html.php', array('articles' => $articles));
    }
}
