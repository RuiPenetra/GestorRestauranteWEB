<?php

use kartik\datetime\DateTimePicker;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Pedido */

$this->title = 'Criar Pedido';

?>

<div class="col-md-12">
    <div class="row d-flex justify-content-center">
        <div class="col-md-1">
            <div class="row justify-content-center"><a class="bg-warning rounded-circle text-center" style="width: 50px; height: 50px;"><i class="fas fa-cart-plus m-3"></i></a></div>
            <div class="row d-flex justify-content-center">Criar</div>
        </div>
        <div class="col-md-2">
            <hr class="connecting-line rounded">
        </div>
        <div class="col-md-1">
            <div class="row justify-content-center"><a class="bg-dark rounded-circle text-center" style="width: 50px; height: 50px;"><i class="fas fa-utensils m-3"></i></a></div>
            <div class="row d-flex justify-content-center">Add Prod</div>
        </div>
        <div class="col-md-2">
            <hr class="connecting-line rounded">
        </div>
        <div class="col-md-1">
            <div class="row justify-content-center"><a class="bg-dark rounded-circle text-center" style="width: 50px; height: 50px;"><i class="fas fa-cash-register m-3"></i></a></div>
            <div class="row d-flex justify-content-center">Terminar</div>
        </div>
    </div>
</div>
<div class="card card-outline card-yellow mr-5 ml-5 mt-3"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title text-gray-dark">
            <i class="fas fa-users"></i>
            <?php if($pedido->tipo==0):?>
            <b>Pedido Restaurante</b>
            <?php else:?>
            <b>Pedido Takeaway</b>
            <?php endif;?>
        </h3>
    </div>
    <div class="card-body" style="display: block;">
        <?php if($pedido->tipo==0):?>
            <?php echo $this->render('//mesa/_search', ['model' => $searchMesa]);
        endIf?>
        <?php $form = ActiveForm::begin(['validateOnBlur'=>false]);
        if($pedido->tipo==0):?>
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
                    <?php foreach ($dataProviderMesa->models as $mesa):?>
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
                                <?php if($mesa->estado==2):?>
                                    <div style="height: 15px">
                                        <?= $form->field($pedido, 'id_mesa')->radio(['class'=>'','uncheck'=>null,'value' => $mesa->id,'label'=>'Selecionar'])?>
                                    </div>
                                <?php endIf?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <div class="row col-md-12 d-flex justify-content-center">
                    <?= LinkPager::widget([
                        'pagination' => $dataProviderMesa->getPagination(),
                        'options' => [
                            'class' => 'page-item',
                        ],
                    ]);?>
                </div>
            </div>
            <?php endif;?>
        <div class="row d-flex justify-content-center">
            <div class="col-md-3">
            <?php if($pedido->tipo!=0):?>
                <?= $form->field($pedido, 'nome_pedido')->textInput(['class'=>'form-control rounded w-100','placeholder'=>'Nome Pedido','maxlength' => 80])->label(false) ?>
            <?php endif;?>
                <?= $form->field($pedido, 'data')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Data'],
                    'type' =>DateTimePicker::TYPE_COMPONENT_PREPEND,
                    'size'=>'md',
                    'readonly' => true,
                    'pluginOptions' => [
                        'todayBtn' => true,
                        'autoclose' => true,
                        'language'=>'pt-PT',
                    ]
                ])->label(false);?>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <?= Html::submitButton('Seguinte', ['class' => 'btn btn-success']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
