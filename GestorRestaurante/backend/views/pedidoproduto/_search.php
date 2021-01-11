<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PedidoprodutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedidoproduto-search">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pedido') ?>

    <?= $form->field($model, 'id_produto') ?>

    <?= $form->field($model, 'estado') ?>

    <?= $form->field($model, 'quant_Pedida') ?>

    <?php // echo $form->field($model, 'preco') ?>

    <?php // echo $form->field($model, 'quant_Entregue') ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-search"></i>', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-dark']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
