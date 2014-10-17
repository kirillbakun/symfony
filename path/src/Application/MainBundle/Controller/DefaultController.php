<?php

namespace Application\MainBundle\Controller;

use Application\MainBundle\Manager\ArticleManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $article_manager = new ArticleManager();
        return $this->render('ApplicationMainBundle:Default:index.html.php', array('name' => 'Your name'));
    }
}
