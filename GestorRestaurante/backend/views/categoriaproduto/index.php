<?php

use kartik\growl\Growl;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriaProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categoria Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="categoria-produto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row col-md-12 col-xl-12">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bullhorn"></i>
                        Categoria
                    </h3>
                </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="row ">
                        <div class="col-md-5">
                            <div class="box-body box-profile user-painel mt-3">
                                <div class="text-center">
                                    <img class="img-responsive" width="100px" height="100px" src="img/soup.png" alt="imgPerfil">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 ">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <?= $form->field($model, 'categoria', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome",  'autofocus' => true])->label(false) ?>

                              <!--  <div class="ml-3">
                                    <a href="<?/*=Url::toRoute(['categoriaproduto/view'])*/?>" type="button" class="btn btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>-->
                            </div>
                            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <!-- /.col -->
            </div>
            </di>
        </div>
        <div class="col-md-7 pl-4">
            <div class="row justify-content-center">
                <div class="row mt-3">
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-cog"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">ENTRADAS</span>
                                <span class="info-box-number">
                                  10
                                  <small>%</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">PRATOS DE SOPA</span>
                                <span class="info-box-number">41,410</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">BEBIDAS</span>
                                <span class="info-box-number">760</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cog"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text"> PRATOS DE CARNE</span>
                                <span class="info-box-number">
                                  10
                                  <small>%</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-blue elevation-1"><i class="fas fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"> PRATOS DE PEIXE</span>
                                <span class="info-box-number">41,410</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">SOBREMESAS</span>
                                <span class="info-box-number">760</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Todas as categorias</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="row justify-content-center">
                <table class="table table-striped col-md-8">
                    <thead>
                    <tr>
                        <th style="width: 100px"></th>
                        <th style="width: 200px">Nome</th>
                        <th style="width: 50px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categorias as $cat):?>
                        <tr>
                            <td> <i class="fas fa-tags"></i></td>
                            <td><?=$cat->categoria?></td>
                            <td>
                                <a href="<?=Url::toRoute(['categoriaproduto/update', 'id' => $cat->id])?>" type="button" class="btn btn-warning">
                                    <i class="far fa-edit color-white"></i>
                                </a>
                                <a href="<?=Url::toRoute(['categoriaproduto/delete', 'id' => $cat->id])?>" data-method="POST" type="button" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.card-body -->
    </div>

</div>
