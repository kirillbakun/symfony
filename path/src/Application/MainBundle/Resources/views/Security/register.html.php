<?php $view->extend('ApplicationMainBundle::layout.html.php') ?>

<?php $view['slots']->start('body'); ?>
<?php echo $view['form']->form($form) ?>
<?php $view['slots']->stop(); ?>