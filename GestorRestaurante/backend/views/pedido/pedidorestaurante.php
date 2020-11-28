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

        <?php echo $this->render('//mesa/_search', ['model' => $searchModel]); ?>
        <?php $form = ActiveForm::begin(); ?>
        <div class="row d-flex justify-content-center">
            <table class="table">
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
                        <td class="text-center">
                            <?= $form->field($mesa, 'id')->radio(['value' => $mesa->id ,'checked'=>false])->label(false) ?>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <?= Html::submitButton('Seguinte', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>


