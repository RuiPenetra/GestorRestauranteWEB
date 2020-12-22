<?php

use yii\bootstrap4\ActiveForm;use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Reserva */

$this->title = 'Create Reserva';
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card card-outline mr-5 ml-5 mt-3"> <!--collapsed-card-->
        <div class="card-body" style="display: block;">


                <?php echo $this->render('//reserva/_searchmesa', ['model' => $searchModel])?>
            <?php $form = ActiveForm::begin(['validateOnBlur'=>false])?>

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
                                    <td class="text-center"><span class="badge bg-danger">Ocupado</span></td>
                                <?php endif;?>

                                <?php if($mesa->estado==2):?>
                                    <td class="text-center"><span class="badge bg-success">Livre</span></td>
                                <?php endif;?>
                                <td>
                                    <?php if($mesa->estado==2 || $mesa->estado==0 ||$mesa->estado==1):?>
                                        <div style="height: 15px">
                                            <?= $form->field($mesa, 'id')->radio(['class'=>'','uncheck'=>null,'value' => $mesa->id,'label'=>'Selecionar'])?>
                                        </div>
                                    <?php endIf?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>

            <div class="col-md-12 text-center">
                <?= Html::submitButton('Seguinte', ['class' => 'btn btn-success']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>