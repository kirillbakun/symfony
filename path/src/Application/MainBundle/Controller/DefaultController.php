<?php

namespace Application\MainBundle\Controller;

use Application\MainBundle\Manager\ArticleManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('ApplicationMainBundle:Article');

        $article_manager = new ArticleManager($repository);
        $articles = $article_manager->getList();

        return $this->render('ApplicationMainBundle:Default:index.html.php', array('name' => 'Your name'));
    }
}
