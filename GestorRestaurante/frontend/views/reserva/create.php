<?php

use kartik\datetime\DateTimePicker;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\LinkPager;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Reserva */

$this->title = 'Criar Reserva';
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$id_user = Yii::$app->user->identity->id;

?>
<?=Html::a( ' <i class="fas fa-undo-alt"></i> Voltar', Yii::$app->request->referrer,['class'=>'btn btn-dark ml-5 mb-2'])?>

<?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id_user) != null):?>
<div class="card card-blue card-outline mr-5 ml-5">
<?php endif?>

<?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$id_user) != null):?>
<div class="card card-purple card-outline mr-5 ml-5">
<?php endif?>
    <div class="card-header">
        <h3 class="card-title text-gray-dark">
            <i class="fas fa-pen-alt"></i>
            Criar Reserva
        </h3>
    </div>
    <div class="card-body" style="display: block;">
        <div class="row col-md-12">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
            </div>
        </div>
        <?php $form = ActiveForm::begin(['enableClientValidation'=> false]);?>
        <div class="row col-md-12">
            <div class="col-md-6">
                    <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id_user) != null):?>
                    <div class="card card-blue card-outline">
                        <?php endif?>
                        <?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$id_user) != null):?>
                        <div class="card card-purple card-outline">
                            <?php endif?>
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-plus"></i> Selecionar Mesa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
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
                                        <?php if($mesa->estado==3):?>
                                            <td class="text-center"><span class="badge bg-danger">Inativa</span></td>
                                        <?php endif;?>
                                        <td>
                                            <?php if($mesa->estado!=3):?>
                                                <div style="height: 15px">
                                                    <?= $form->field($reserva, 'id_mesa')->radio(['class'=>'','uncheck'=>null,'value' => $mesa->id,'label'=>'Selecionar'])?>
                                                </div>
                                            <?php endIf?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                            <div class="row col-md-12 d-flex justify-content-center mt-4">
                                <?= LinkPager::widget([
                                    'pagination' => $dataProviderMesa->getPagination(),
                                    'options' => [
                                        'class' => 'page-item',
                                    ],
                                ]);?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
            </div>
        <div class="col-md-6 text-center">
            <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id_user) != null):?>
            <div class="card card-blue card-outline">
                <?php endif?>
                <?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$id_user) != null):?>
                <div class="card card-purple card-outline">
                    <?php endif?>
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-marker"></i> Digite...</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="col-md-5 mt-2">
                        <?= $form->field($reserva, 'data_hora')->widget(DateTimePicker::classname(), [
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
                    <div class="col-md-5 mt-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>

                            <?= $form->field($reserva, 'nome_da_reserva')->textInput(['maxlength' => true,'placeholder'=>'Nome da reserva'])->label(false) ?>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <?= $form->field($reserva, 'n_pessoas')->textInput(['placeholder'=>'NºPessoas','type'=>'number','min'=>0])->label(false) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="d-flex justify-content-center">
            <?= Html::submitButton('Criar', ['class' => 'btn btn-success']) ?>
        </div>
            <?php ActiveForm::end(); ?>
</div>
