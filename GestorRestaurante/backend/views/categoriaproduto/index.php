<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriaProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categoria Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-produto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row ml-4">
        <div class="row">
            <div class="row d-flex justify-content-center">
                <div class="mr-2">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1 justify-content-center"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Entradas</span>
                            <span class="info-box-number">760</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>

                <div class="mr-2">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1 justify-content-center"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Entradas</span>
                            <span class="info-box-number">760</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>

                <div class="mr-2">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1 justify-content-center"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Entradas</span>
                            <span class="info-box-number">760</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>

                <div class="mr-2">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1 justify-content-center"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Entradas</span>
                            <span class="info-box-number">760</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>

                <div class="mr-2">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1 justify-content-center"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Entradas</span>
                            <span class="info-box-number">760</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>

                <div class="mr-2">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1 justify-content-center"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Entradas</span>
                            <span class="info-box-number">760</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>

                <div class="mr-1">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1 justify-content-center"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Entradas</span>
                            <span class="info-box-number">760</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>

            </div>
        </div>

    </div>
    <p>
        <?= Html::a('Create Categoria Produto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'categoria',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
