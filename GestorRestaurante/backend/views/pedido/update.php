<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pedido */

$this->title = 'Atualizar Pedido:  Ref: ' . $pedido->id;
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

        <?= $form->field($pedido, 'tipo')->radio(['class'=>'','id'=>'radio-restaurante','uncheck'=>null,'value' => '0','label'=>'Restaurante','onChange'=>'showDivRestaurante()','onselect'=>'showDivRestaurante()'])?>
        <?= $form->field($pedido, 'tipo')->radio(['class'=>'','id'=>'radio-takeaway','uncheck'=>null,'value' => '1','label'=>'Take Away','onChange'=>'showDivTakeaway()','onselect'=>'showDivTakeaway()'])?>

        <?php if($pedido->tipo==1):?>
        <div class="" id="div-takeaway" style="display: block;">
            <?= $form->field($pedido, 'nome_pedido')->textInput(['maxlength' => true]) ?>
        </div>
        <?php else:?>
        <div class="" id="div-restaurante" style="display: block;">
            <div class="row d-flex justify-content-center">
                <table class="table" id="table-item-pedido">
                    <thead>
                    <tr>
                        <th style="width: 60px" class="text-center"></th>
                        <th class="text-center">Nº</th>
                        <th class="text-center">Lugares</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dataProvider->models as $mesa):?>
                        <tr>
                            <td class="text-center"><img src="https://img.icons8.com/fluent-systems-filled/24/000000/table.png"/></td>
                            <td class="text-center"><?=$mesa->id?></td>
                            <td class="text-center"><?=$mesa->n_lugares?></td>
                            <?php if($mesa->estado==0):?>
                                <td class="text-center"><span class="badge bg-dark">Reservada</span></td>
                            <?php endif;?>
                            <?php if($mesa->estado==1):?>
                                <td class="text-center"><span class="badge bg-warning">Ocupada</span></td>
                            <?php endif;?>
                            <?php if($mesa->estado==2):?>
                                <td class="text-center"><span class="badge bg-success">Livre</span></td>
                            <?php endif;?>
                            <td>
                                <div style="height: 15px">
                                    <?= $form->field($pedido, 'id_mesa')->radio(['class'=>'','uncheck'=>null,'value' => $mesa->id,'label'=>'Selecionar'])?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php endIf?>
        <?= $form->field($pedido, 'nota')->textarea(['class'=>' form-control','rows'=>5,'cols'=>60])->label(true) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
