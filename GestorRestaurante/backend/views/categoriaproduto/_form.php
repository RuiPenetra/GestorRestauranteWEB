<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoriaProduto */
/* @var $form yii\widgets\ActiveForm */
?>

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
                <?= $form->field($model, 'nome', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome",  'autofocus' => true])->label(false) ?>
            </div>
            <div class="d-flex justify-content-end">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success','name'=>'createCategoria-button']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
