<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pedido */

$this->title = 'Create Pedido';
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin() ?>

<?= $form->field($pedido, 'id_mesa')->textInput(['class'=>'form-control rounded', 'placeholder'=>'Nome Pedido'])->label(false)?>

        <?= $form->field($pedido, 'nome_pedido')->textInput()->label(false) ?>
        <?=$form->field($pedido,'nota')->textArea()?>
        <?=$form->field($pedido,'quantidade')->textInput(['type'=>'number'])?>

        <?=$form->field($pedido,'id_produto')->textInput()->label(false)?>
<?/*=$form->field($pedido,'tipo')->textInput()->label(false)*/?>
        <?= Html::submitButton('Criar', ['class' => 'btn col-md-4']) ?>
        <?php ActiveForm::end(); ?>
