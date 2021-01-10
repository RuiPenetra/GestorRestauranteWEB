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
    <?=Html::a( ' <i class="fas fa-undo-alt"></i> Voltar', Yii::$app->request->referrer,['class'=>'btn btn-dark ml-5 mb-2'])?>

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
