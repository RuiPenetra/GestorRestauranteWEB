<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pedido */

$this->title = 'Create Pedido';
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $id = Yii::$app->user->identity->id; ?>
    <?php $form= ActiveForm::begin(); ?>


    <?= $form->field($model, 'data')->widget(DateTimePicker::classname(), [
    'options' => ['placeholder' => 'Enter event time ...'],
    'type' =>DateTimePicker::TYPE_COMPONENT_APPEND,
    'pluginOptions' => [
    'todayBtn' => true,
    'autoclose' => true,
    'language'=>'pt-PT',

    ]
    ]);?>


    <?= $form->field($model, 'estado')->textInput() ?>

    <?php if(Yii::$app->authManager->getAssignment('cliente',$id)){
     $form->field($model, 'tipo')->textInput(['tipo'=>'Takeaway','readonly'=>true]);
    }else{

    }
    ?>

    <?= $form->field($model, 'nome_pedido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_mesa')->textInput() ?>

    <?= $form->field($model, 'id_perfil')->textInput() ?>

<div class="col-md-6">

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>

</div>
