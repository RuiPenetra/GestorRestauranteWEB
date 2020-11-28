<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoriaProduto */

$this->title = 'Update Categoria Produto: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categoria Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

    <div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-bullhorn"></i>
                Atualizar categoria
            </h3>
            <!--<div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>-->
        </div>
        <div class="card-body" style="display: block;">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row d-flex justify-content-center">
                <div class="col-md-5 col-xl-2 d-flex justify-content-center">
                    <div class="box-body box-profile user-painel">
                        <?= Html::img('@web/img/tag.png' , ['alt' => 'Tag', 'class' => 'img-fluid', 'width'=>'100px']);?>
                    </div>
                </div>
                <div class="col-md-5 col-xl-3">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <?= $form->field($model, 'categoria', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome",  'autofocus' => true])->label(false) ?>
                    </div>
                    <div class="d-flex justify-content-end">
                        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.card-body -->
    </div>

