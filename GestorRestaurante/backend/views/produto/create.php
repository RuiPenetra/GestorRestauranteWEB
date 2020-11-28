<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Produto */

$this->title = 'Create Produto';
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-bullhorn"></i>
            Criar produto
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="row col-md-12">
                <div class="col-md-3 mt-0 ">
                    <div class="box-body box-profile user-painel mt-3">
                        <div class="text-center">
                            <?= Html::img('@web/img/food.png' , ['alt' => 'Tag', 'class' => 'img-fluid', 'width'=>'100px']);?>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="input-group mb-3 col-md-8">
                        <div class="input-group-append rounded-left">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <?= $form->field($produto, 'nome', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome",  'autofocus' => true])->label(false) ?>
                    </div>
                    <div class="input-group mb-3 col-md-8">
                        <?= $form->field($produto, 'preco', ['options' => ['tag' => 'input',  'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Preço",  'type'=>'number', 'step' => '0.01', 'autofocus' => true])->label(false) ?>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-euro-sign"></i></span>
                        </div>
                    </div>
                    <div class="input-group mb-3 col-md-8">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <?=$form->field($produto,'id_categoria_produto')->dropDownList($categorias)->label(false);?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <?= $form->field($produto, 'ingredientes')->textArea([ 'class'=>'col-12','maxlength' => 300, 'rows' => 3 , 'cols' => 40,'placeholder'=>'Ingredientes'])->label(false)?>
                    </div>
                    <div class="input-group mb-3">
                        <?= Html::submitButton('Criar', ['class' => 'btn login_btn col-md-4', 'name' => 'login-button']) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <!-- /.card-body -->
</div>
