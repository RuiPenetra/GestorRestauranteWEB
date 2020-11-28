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
    <div class="card-body" style="display: block;">

        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="input-group mb-3 col-md-8">
                <h5>Tipo de pedido:</h5>
                </div>
                <div class="input-group mb-3 col-md-12">
                    <div class="col-md-2">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text rounded-left"><i class="fas fa-user"></i></span>
                            </div>
                            <?= $form->field($model, 'nome_pedido')->textInput(['class'=>'form-control rounded-right','maxlength' => true,'placeholder'=>'Nome Pedido','id'=>'inputNome'])->label(false); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= Html::submitButton('Seguinte', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>
    </div>


