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
<?=Html::a( ' <i class="fas fa-undo-alt"></i> Voltar', Yii::$app->request->referrer,['class'=>'btn btn-dark ml-5 mb-2'])?>

<div class="card card-outline card-yellow mr-5 ml-5 mt-3">
    <div class="card-header">
        <h3 class="card-title text-gray-dark">
            <i class="fas fa-users"></i>
            <b>Pedido Takeaway</b>
        </h3>
    </div>
    <?php $form = ActiveForm::begin(['validateOnBlur'=>false]);?>
    <div class="row col-md-12">
        <div class="col-md-6">
            <div class="card card-outline card-yellow col-md-12 ml-2">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-file-signature"></i> Inserir o nome do pedido</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="col-md-7">
                        <?= $form->field($pedido, 'nome_pedido')->textInput(['class'=>'form-control rounded w-100','placeholder'=>'Nome Pedido','maxlength' => 80])->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <?= Html::submitButton('Criar', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>

