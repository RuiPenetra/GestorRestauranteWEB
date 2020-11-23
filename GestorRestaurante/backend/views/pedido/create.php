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
                        <?= $form->field($pedido, 'tipo')->radio(['label' => 'Restaurante','value' => 0,'id'=>'checkHide','onclick' => 'mostrarInput()']) ?>
                    </div>
                    <div class="col-md-10">
                        <span class="input-group mb-3 col-md-5" id="" style="display:block">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text rounded-left"><i class="fas fa-user"></i></span>
                                </div>
                                <?= $form->field($pedido, 'id_mesa')->dropDownList($mesas,['prompt' => '-- Selecione --','class'=>'form-control rounded-right','id'=>'dropDownMesas'])->label(false) ?>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="input-group mb-3 col-md-12">
                    <div class="col-md-2">
                        <?= $form->field($pedido, 'tipo')->radio(['label' => 'Takeaway','value' => 1,'id'=>'checkShow','onclick' => 'mostrarInput()'])?>
                    </div>
                    <div class="col-md-10">
                        <span class="input-group mb-3 col-md-5"  style="display:block">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text rounded-left"><i class="fas fa-user"></i></span>
                                </div>
                                <?= $form->field($pedido, 'nome_pedido')->textInput(['class'=>'form-control rounded-right','maxlength' => true,'placeholder'=>'Nome Pedido','id'=>'inputNome'])->label(false); ?>

                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>
    </div>


