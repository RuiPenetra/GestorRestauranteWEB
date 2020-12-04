<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pedido */

$this->title = 'Update Pedido: ' . $pedido->id;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $pedido->id, 'url' => ['view', 'id' => $pedido->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?php $form = ActiveForm::begin(); ?>
<div class="card card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-bullhorn"></i>
            1º Passo
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">

        <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($pedido, 'scenario')->radio(['value'=>'scenariorestaurante','label'=>'Restaurante']) ?>
        <?= $form->field($pedido, 'scenario')->radio(['value'=>'scenariotakeaway','label'=>'Takeaway']) ?>

        <?= $form->field($pedido, 'nome_pedido')->textInput(['maxlength' => true]) ?>

        <?= $form->field($pedido, 'nota')->textInput(['maxlength' => true]) ?>

        <?= $form->field($pedido, 'estado')->textInput() ?>

        <?= $form->field($pedido, 'id_mesa')->textInput() ?>

        <?= $form->field($pedido, 'id_perfil')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
