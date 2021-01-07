<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mesa */

$this->title = 'Atualizar Mesa: ' . $mesa->id;
?>

    <?= $this->render('_form', [
        'model' => $mesa,
    ]) ?>

