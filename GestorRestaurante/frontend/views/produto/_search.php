<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProdutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>


    <div class="row col-12 mt-3">
        <div class="col-3 col-lg-3 ml-3">
            <?= $form->field($model, 'nome')->textInput(['class'=>'form-control rounded','placeholder'=>'Insira o nome'])->label(false) ?>
        </div>
        <div class="col-3 col-lg-3 ml-2">
            <?= $form->field($model, 'preco')->textInput(['class'=>'form-control rounded','type'=>'number','placeholder'=>'Insira o preco','min'=>0,00,'step'=>'0.01'])->label(false)  ?>
        </div>
        <div class="col-3 col-lg-3 ml-2">
            <?= $form->field($model, 'id_categoria')->dropDownList($categorias,['class'=>'form-control rounded','prompt'=>'--- Todas as Categorias ---'])->label(false);?>
        </div>
        <div class="col-2 col-lg-2">
            <?= Html::submitButton('<i class="fas fa-search"></i>', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
