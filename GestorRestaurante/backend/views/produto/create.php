<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Produto */

$this->title = 'Criar Produto';
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?=Html::a( ' <i class="fas fa-undo-alt"></i> Voltar', Yii::$app->request->referrer,['class'=>'btn btn-dark ml-5 mb-2'])?>

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
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                        </div>
                        <?= $form->field($produto, 'nome', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control rounded-right' , 'placeholder' => "Nome",  'autofocus' => true])->label(false) ?>
                    </div>
                    <div class="input-group mb-3 col-md-8">
                        <?= $form->field($produto, 'preco', ['options' => ['tag' => 'input',  'style' => 'display: none; ']])->textInput(['class'=>'form-control rounded-left' , 'placeholder' => "Preço",  'type'=>'number', 'step' => '0.01','min' => '0', 'autofocus' => true])->label(false) ?>
                        <div class="input-group-append">
                            <span class="input-group-text rounded-right"><i class="fas fa-euro-sign"></i></span>
                        </div>
                    </div>
                    <div class="input-group mb-3 col-md-8">
                        <div class="input-group-append">
                            <span class="input-group-text rounded-left"><i class="fas fa-tag"></i></span>
                        </div>
                        <?=$form->field($produto,'id_categoria')->dropDownList($categorias)->label(false);?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <?= $form->field($produto, 'ingredientes')->textArea([ 'class'=>'col-12','maxlength' => 300, 'rows' => 3 , 'cols' => 40,'placeholder'=>'Ingredientes'])->label(false)?>
                    </div>
                    <div class="input-group mb-3">
                        <?= Html::submitButton('Atualizar', ['class' => 'btn login_btn col-md-4', 'name' => 'login-button']) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <!-- /.card-body -->
</div>
