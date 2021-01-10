<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mesa */

$this->title = 'Atualizar Mesa: ' . $mesa->id;
?>
<?=Html::a( ' <i class="fas fa-undo-alt"></i> Voltar', Yii::$app->request->referrer,['class'=>'btn btn-dark ml-5 mb-2'])?>

    <?= $this->render('_form', [
        'model' => $mesa,
    ]) ?>

