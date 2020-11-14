<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Produto */

$this->title = 'Update Produto: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produto-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row col-12">
        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-bullhorn"></i>
                    Produtos
                </h3>
            </div>
            <div class="card-body">
                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="row col-md-12">
                        <div class="col-md-3 mt-0 ">
                            <div class="box-body box-profile user-painel mt-3">
                                <div class="text-center">
                                    <img class="img-responsive" width="100px" height="100px" src="img/soup.png" alt="imgPerfil">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="input-group mb-3 col-md-8">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <?= $form->field($model, 'nome', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome",  'autofocus' => true])->label(false) ?>
                            </div>
                            <div class="input-group mb-3 col-md-8">
                                <?= $form->field($model, 'preco', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Preço",  'autofocus' => true])->label(false) ?>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-euro-sign"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3 col-md-8">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <?= $form->field($produto_categoria, 'id_categoria_produto')->dropDownList(ArrayHelper::map($categorias_principais, 'id', 'categoria'),
                                    ['prompt'=>'Selecione...'],['maxlenght'=> true],
                                    ['options'=> ['class' => 'form-control input_user rounded-right']])->label(false); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <?= $form->field($model, 'ingredientes')->textArea([ 'class'=>'col-12','maxlength' => 300, 'rows' => 3 , 'cols' => 40,'placeholder'=>'Ingredientes'])->label(false)?>
                            </div>
                            <div class="input-group mb-3">
                                <?= Html::submitButton('Criar', ['class' => 'btn login_btn col-md-4', 'name' => 'login-button']) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>


</div>
