<?php $view->extend('ApplicationMainBundle::layout.html.php') ?>

<?php $view['slots']->start('body'); ?>
    <ul>
        <?php foreach($articles as $article): ?>
            <?php
/*                $user = $article->getUser();
                $user_login = !(empty($user)) ? ' - ' .$user->getLogin() : '';
            */?>
            <li><?php echo $article->getText(); ?></li>
        <?php endforeach; ?>
    </ul>
<?php $view['slots']->stop(); ?>