<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pedido */

$this->title = 'Update Pedido: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin();?>
    <div class="row d-flex justify-content-center"
    <label>Atualize o Nome Pedido</label>
    </div>
    <div class="row d-flex justify-content-center"

    <?= $form->field($model, 'nome_pedido', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome Pedido",  'autofocus' => true])->label(false) ?>

    <?= Html::submitButton('Atualizar', ['class' => 'btn btn-success']) ?>

    </div>
    <?php ActiveForm::end(); ?>

</div>
