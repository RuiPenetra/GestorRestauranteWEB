<?php

use kartik\growl\Growl;
use yii\helpers\ArrayHelper;
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

    <div class="card card-outline card-warning"> <!--collapsed-card-->
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-bullhorn"></i>
                Criar categoria
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: block;">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row d-flex justify-content-center">
                <div class="col-md-5 col-xl-2 d-flex justify-content-center">
                    <div class="box-body box-profile user-painel">
                        <img class="img-responsive" width="100px" height="100px" src="img/soup.png" alt="imgPerfil">
                    </div>
                </div>
                <div class="col-md-5 col-xl-3">
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
                    <div class="d-flex justify-content-end">
                        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.card-body -->
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

