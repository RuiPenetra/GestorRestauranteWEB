<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Gestor Restaurante';
?>
<h1 align="center"><b>Ementa</b></h1>
<div class="site-index-img">
    <img src="img/logo.png" width="200px" height="200px"  class="rounded mx-auto d-block" alt="...">

</div>
<br>
<div class="site-menu-butoes">
    <a type="button" href="<?= Url::toRoute(['site/menuentradas']) ?>"class="btn btn-warning">Entradas
        <i class="fas fa-bread-slice"></i>


    </a>
    <a type="button" href="<?= Url::toRoute(['site/menucarne'])?>"class="btn btn-danger">Carne
        <i class="fas fa-drumstick-bite"></i>
    </a>

    <a type="button" href="<?= Url::toRoute(['site/menupeixe'])?>" class="btn btn-info">Peixe
        <i class="fas fa-fish"></i>
    </a>
        <br><br>
    <a type="button" href="<?= Url::toRoute(['site/menubebida'])?>" class="btn btn-primary">Bebidas
        <i class="fas fa-glass-martini-alt"></i>
    </a>
    <a type="button" href="<?= Url::toRoute(['site/menusopa'])?>" class="btn btn-success">Sopa
        <img src="https://img.icons8.com/ios-filled/20/000000/soup-plate.png"/>
    </a>
    <a type="button" href="<?= Url::toRoute(['site/menusobremesa'])?>" class="btn btn-dark">Sobremesas
        <i class="fas fa-ice-cream"></i>
    </a>
</div>

<div class="container-fluid">


</div>