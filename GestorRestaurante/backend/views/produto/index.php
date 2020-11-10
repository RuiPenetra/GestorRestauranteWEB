<?php

use yii\bootstrap4\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $this->title = 'Utilizadores';?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= Url::toRoute(['site/index']) ?>">Home</a></li>
                    <li class="breadcrumb-item active"><?=$this->title?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="produto-index">
    <div class="row col-md-12 col-xl-12">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bullhorn"></i>
                        Produtos
                    </h3>
                </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="row">
                            <div class="row col-12">
                                <div class="col-md-3 mt-0 ">
                                    <div class="box-body box-profile user-painel mt-3">
                                        <div class="text-center">
                                            <img class="img-responsive" width="100px" height="100px" src="img/soup.png" alt="imgPerfil">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <?= $form->field($model, 'nome', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome",  'autofocus' => true])->label(false) ?>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <?= $form->field($model, 'preco', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome",  'autofocus' => true])->label(false) ?>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <?= $form->field($produto_categoria, 'id_categoria_produto')->dropDownList(ArrayHelper::map($categorias, 'id', 'categoria'),
                                            ['prompt'=>'Selecione...'],['maxlenght'=> true],
                                            ['options'=> ['class' => 'form-control input_user rounded-right']])->label(false); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group mb-3">
                                        <?= $form->field($model, 'ingredientes')->textArea([ 'class'=>'col-md-8','maxlength' => 300, 'rows' => 3,'placeholder'=>'Ingredientes'])->label(false)?>
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
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bullhorn"></i>
                        Categoria
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-9">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <?= $form->field($categoria, 'categoria', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome",  'autofocus' => true])->label(false) ?>

                                <div class="ml-3">
                                    <a href="<?=Url::toRoute(['categoriaproduto/view'])?>" type="button" class="btn btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                                      <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </di>
    </div>

</div>

<div class="row d-flex justify-content-center mr-5 ml-5 ">
    <div class="col-12">
        <div class="card card-warning card-tabs">
            <div class="card-header p-0 pt-1 d-flex justify-content-center ">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-entradas-tab" data-toggle="pill" href="#custom-tabs-one-entradas" role="tab" aria-controls="custom-tabs-one-entradas" aria-selected="true"><h6><i class="fas fa-chair"></i> Entradas</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-pratos-sopa-tab" data-toggle="pill" href="#custom-tabs-one-pratos-sopa" role="tab" aria-controls="custom-tabs-one-pratos-sopa" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Prato Sopa</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-pratos-carne-tab" data-toggle="pill" href="#custom-tabs-one-pratos-carne" role="tab" aria-controls="custom-tabs-one-pratos-carne" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Prato Carne</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-pratos-peixe-tab" data-toggle="pill" href="#custom-tabs-one-pratos-peixe" role="tab" aria-controls="custom-tabs-one-pratos-peixe" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Prato Peixe</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-pratos-vegetariano-tab" data-toggle="pill" href="#custom-tabs-one-pratos-vegetarianos" role="tab" aria-controls="custom-tabs-one-pratos-vegetariano" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Prato Vegetariano</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-pratos-peixe-tab" data-toggle="pill" href="#custom-tabs-one-sobremesa" role="tab" aria-controls="custom-tabs-one-sobremesa" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Sobremesa</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-bebidas-tab" data-toggle="pill" href="#custom-tabs-one-bebidas" role="tab" aria-controls="custom-tabs-one-bebidas" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Bebidas</h6></a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-one-entradas" role="tabpanel" aria-labelledby="custom-tabs-one-entradas-tab">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row d-flex justify-content-center">
                                <div class="col-8">
                                    <table id="index" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="index">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"></th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Nome</th>
                                            <th class="sorting" tabindex="1" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Preço</th>
                                            <th class="sorting" tabindex="2" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Categoria</th>
                                            <th class="sorting" tabindex="3" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"></th>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($produtos as $produto):?>
                                            <tr role="row justify-center" class="odd">
                                                <td class="" tabindex="" width="200px" >
                                                    <div class="text-center">
                                                        <img class="img-responsive" width="50px" height="50px" src="img/soup.png" alt="imgPerfil">
                                                    </div>
                                                </td>
                                                <td class="" tabindex="" width="200px" ><?=$produto->nome?></td>
                                                <td class=""  width="250px">Categoria</td>
                                                <td class=""  width="250px"><?=$produto->preco?> </td>
                                                <td class="dtr-control sorting_1 text-center" width="200px" tabindex="8">
                                                    <a href="<?=Url::toRoute(['produto/view', 'id' => $produto->id])?>" type="button" class="btn btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?=Url::toRoute(['produto/update', 'id' => $produto->id])?>" type="button" class="btn btn-warning">
                                                        <i class="far fa-edit color-white"></i>
                                                    </a>
                                                    <a href="<?=Url::toRoute(['produto/delete', 'id' => $produto->id])?>" data-method="POST" type="button" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-pratos-sopa" role="tabpanel" aria-labelledby="custom-tabs-one-pratos-sopa-tab">
                        SOPA
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-pratos-carne" role="tabpanel" aria-labelledby="custom-tabs-one-pratos-carne-tab">
                        PRATOS CARNE
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-pratos-peixe" role="tabpanel" aria-labelledby="custom-tabs-one-pratos-peixe-tab">
                        PRATOS PEIXE
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-pratos-vegetarianos" role="tabpanel" aria-labelledby="custom-tabs-one-pratos-vegetarianos-tab">
                        PRATOS VEGETARIANOS
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-sobremesa" role="tabpanel" aria-labelledby="custom-tabs-one-sobremesa-tab">
                        SOBREMESA
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-bebidas" role="tabpanel" aria-labelledby="custom-tabs-one-bebidas-tab">
                        BEBIDAS
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'ingredientes')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'preco')->textInput() ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <?= Html::submitButton('Create', ['class' => 'btn btn-success','id'=>'submit']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>


