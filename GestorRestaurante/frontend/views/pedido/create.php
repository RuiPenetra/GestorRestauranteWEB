<?php

use kartik\datetime\DateTimePicker;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Pedido */

$this->title = 'Criar Pedido';
$id_user = Yii::$app->user->identity->id;

?>
<?=Html::a( ' <i class="fas fa-undo-alt"></i> Voltar', Yii::$app->request->referrer,['class'=>'btn btn-dark ml-5 mb-2'])?>

<?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id_user) != null):?>
<div class="card card-blue card-outline mr-5 ml-5">
<?php endif?>
<?php if(Yii::$app->authManager->getAssignment('cliente',$id_user) != null):?>
<div class="card card-red card-outline mr-5 ml-5">
<?php endif?>
    <div class="card-header">
    <h3 class="card-title text-gray-dark">
        <i class="fas fa-users"></i>
        <b>Pedido Takeaway</b>
    </h3>
    </div>
    <div class="card-body">

    <?php $form = ActiveForm::begin(['validateOnBlur'=>false]);?>
    <div class="row col-md-12 d-flex justify-content-center">
        <div class="col-md-6">
            <?= $form->field($pedido, 'nome_pedido')->textInput(['class'=>'form-control rounded w-100 mr-4 ml-4','placeholder'=>'Nome Pedido','maxlength' => 80])->label(false) ?>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <?= Html::submitButton('Criar', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>

