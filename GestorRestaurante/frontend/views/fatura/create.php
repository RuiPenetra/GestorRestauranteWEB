<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fatura */

$this->title = 'Create Fatura';
$this->params['breadcrumbs'][] = ['label' => 'Faturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-calendar-alt"></i>
            Gerar Fatura
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <div class="row">
            <div class="row col-md-12">
                <div class="col-md-3 mt-0 ">
                    <div class="box-body box-profile user-painel mt-3">
                        <div class="text-center">
                            <img class="img-responsive" width="100px" height="100px" src="img/calendario.png" alt="imgPerfil">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="input-group mb-3">
                        <?= $form->field($fatura, 'nif')->textInput() ?>
                    </div>
                    <div class="input-group mb-3">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
