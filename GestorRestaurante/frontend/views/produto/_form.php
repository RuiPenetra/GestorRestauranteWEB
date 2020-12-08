<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row d-flex justify-content-center"
    <div class="col-md3-mr3">
    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row d-flex justify-content-center"
    <div class="col-md3-mr3">
    <?= $form->field($model, 'ingredientes')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row d-flex justify-content-center"
    <div class="col-md3-mr3">
    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row d-flex justify-content-center"
    <div class="col-md3-mr3">
        <?=$form->field($model,'id_categoria')->dropDownList($categorias)->label(false);?>
    </div>
    <div class="form-group">
        <div class="row d-flex justify-content-center"
        <div class="col-md3-mr3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
