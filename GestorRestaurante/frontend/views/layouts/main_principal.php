<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use yii\web\Session;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="fundo">
<?php $this->beginBody() ?>

<div class="wrap">
    <nav class="sticky-top navbar navbar-expand-lg navbar-dark info-color">
        <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item avatar">
                <a class="nav-link p-0" href="<?= Url::toRoute(['site/index'])?>">
                    <?= Html::img('img/logo.png' , ['alt' => 'Gestor Restaurante logo', 'class' => 'brand-image img-circle elevation-3' , 'height' =>'35']);?>
                    <span class="navbar-brand">Gestor Restaurante</span>
                </a>
            </li>
        </ul>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">

                    <a class="nav-link" href="<?= Url::toRoute(['site/login']) ?>">
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::toRoute(['site/signup']) ?>">
                        Registar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::toRoute(['site/menu']) ?>">
                        Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::toRoute(['site/about']) ?>">
                        About</a>
                <!--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> Profile </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="#">My account</a>
                        <a class="dropdown-item" href="#">Log out</a>
                    </div>
                </li>-->
            </ul>
        </div>
    </nav>

    <div class="content">

        <?=$content?>

    </div>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
