<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Gestor Restaurante';
?>

<div class="row d-flex justify-content-center mt-4">
    <h1><b>Ementa</b></h1>
</div>
<br>
<div class="container pb-4">
    <div class="card card-outline card-blue">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-utensils"></i>
                <b>Pesquisar Ementa</b>
            </h3>
        </div>
        <div class="card-body p-0">

            <?php echo $this->render('//produto/_search', ['model' => $searchModel,'categorias'=>$categorias]); ?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="row">
                <?php foreach ($dataProvider->models as $produto): ?>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card ">
                        <div class="row d-flex justify-content-center">
                            <?php if ($produto->categoria->nome == 'Entrada'): ?>
                                <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-fluid m-2','style'=>'width:130px;']); ?>
                            <?php endif; ?>
                            <?php if ($produto->categoria->nome == 'Sopa'): ?>
                                <?= Html::img('@web/img/soup.png', ['alt' => 'Product Image',  'class' => 'img-fluid m-2','style'=>'width:130px;']); ?>
                            <?php endif; ?>
                            <?php if ($produto->categoria->nome == 'Carne'): ?>
                                <?= Html::img('@web/img/plates_meat.png', ['alt' => 'Product Image', 'class' => 'img-fluid m-2','style'=>'width:130px;']); ?>
                            <?php endif; ?>
                            <?php if ($produto->categoria->nome == 'Peixe'): ?>
                                <?= Html::img('@web/img/plates_fish.png', ['alt' => 'Product Image', 'class' => 'img-fluid m-2','style'=>'width:130px;']); ?>
                            <?php endif; ?>
                            <?php if ($produto->categoria->nome == 'Sobremesa'): ?>
                                <?= Html::img('@web/img/plates_dessert.png', ['alt' => 'Product Image', 'class' => 'img-fluid m-2','style'=>'width:130px;']); ?>
                            <?php endif; ?>
                            <?php if ($produto->categoria->nome == 'Bebida'): ?>
                                <?= Html::img('@web/img/drink.png', ['alt' => 'Product Image', 'class' => 'img-fluid m-2','style'=>'width:130px;']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row ml-2 mr-2">
                        <h7><b><?=$produto->nome?></b></h7>
                    </div>
                    <div class="row ml-2 mr-2 mt-2">
                        <div class="col">
                            <p class="«"><?=$produto->preco?> <i class="fas fa-euro-sign text-yellow"></i></p>
                        </div>
                        <div class="col text-right">
                            <?php if ($produto->categoria->nome == 'Entrada'): ?>
                                <span class="badge badge-warning text-gray">
                            <?php endif; ?>
                            <?php if ($produto->categoria->nome == 'Sopa'): ?>
                                <span class="badge badge-success">
                            <?php endif; ?>
                                    <?php if ($produto->categoria->nome == 'Carne'): ?>
                                <span class="badge badge-danger text-white">
                            <?php endif; ?>
                                    <?php if ($produto->categoria->nome == 'Peixe'): ?>
                                <span class="badge badge-blue-light">
                            <?php endif; ?>
                                    <?php if ($produto->categoria->nome == 'Sobremesa'): ?>
                                <span class="badge badge-info">
                            <?php endif; ?>
                                    <?php if ($produto->categoria->nome == 'Bebida'): ?>
                                <span class="badge badge-orange">
                            <?php endif; ?>
                                    <?php if ($produto->categoria->nome != 'Entrada' && $produto->categoria->nome != 'Sopa' && $produto->categoria->nome != 'Carne'
                                    && $produto->categoria->nome != 'Peixe' && $produto->categoria->nome != 'Sobremesa'&& $produto->categoria->nome != 'Bebida'): ?>
                                <span class="badge badge-dark">
                            <?php endif; ?>
                            <?=$produto->categoria->nome?>
                                </span>
                        </div>
                    </div>
                    <div class="row ml-3 mr-3 mb-5">
                        <a href="#" class="btn btn-info btn-block">Saber mais...</a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>

    </div>
</div>


