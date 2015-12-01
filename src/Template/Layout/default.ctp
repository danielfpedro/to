<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('../lib/bootstrap/dist/css/bootstrap.min') ?>
    <?= $this->Html->css('../lib/font-awesome/css/font-awesome.min') ?>
    <?= $this->Html->css('../lib/jquery-ui/themes/vader/jquery-ui.min') ?>
    <?= $this->Html->css('app.min.css') ?>

    <?= $this->Html->script('../lib/jquery/dist/jquery.min') ?>
    <?= $this->Html->script('../lib/jquery-ui/jquery-ui.min') ?>
    <?= $this->Html->script('../lib/bootstrap/dist/js/bootstrap.min') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->element('Site/navbar') ?>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
    <?= $this->cell('Footer') ?>
</body>
</html>
