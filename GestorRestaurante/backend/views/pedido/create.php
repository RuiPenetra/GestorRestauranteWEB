<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pedido */

$this->title = 'Create Pedido';
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
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
    <div class="card-body text-center" style="display: block;">
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3 col-md-8">
                <h5>Tipo de pedido:</h5>
                </div>
                <div class="input-group mb-3 col-md-8">
                    <?= $form->field($model, 'tipo')->radio(['label' => 'Restaurante', 'value' => 0,'id'=>'checkHide','onclick' => 'mostrarInput()']) ?>
                </div>
                <div class="input-group mb-3 col-md-8">
                    <?= $form->field($model, 'tipo')->radio(['label' => 'Takeaway', 'value' => 1,'id'=>'checkShow','onclick' => 'mostrarInput()'])?>
                        <div class="col-md-6">
                            <span class="input-group mb-3 col-md-5" id="show" style="display:none">
                            <?= $form->field($model, 'nome_pedido')->textInput(['maxlength' => true,'placeholder'=>'Nome','id'=>'inputNome'])->label(false); ?>
                            </span>
                        <div>
                </div>
            </div>
        </div>
        <div class="input-group mb-3 col-md-8">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        <div>
</div>


