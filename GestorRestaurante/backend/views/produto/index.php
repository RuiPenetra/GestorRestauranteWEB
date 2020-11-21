<?php

use common\produtos\CategoriaProduto;
use yii\bootstrap4\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchproduto common\produtos\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
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
                                <img class="img-responsive" width="100px" height="100px" src="img/soup.png" alt="imgPerfil">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group mb-3 col-md-8">
                            <div class="input-group-append">
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

    <div class="row d-flex justify-content-center mr-5 ml-5 ">
        <div class="col-12">
            <div class="card card-warning card-tabs">
                <div class="card-header p-0 pt-1 d-flex justify-content-center ">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-entradas-tab" data-toggle="pill" href="#custom-tabs-one-entradas" role="tab" aria-controls="custom-tabs-one-entradas" aria-selected="true"><h6><i class="fas fa-chair"></i> Entradas</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-pratos-sopa-tab" data-toggle="pill" href="#custom-tabs-one-pratos-sopa" role="tab" aria-controls="custom-tabs-one-pratos-sopa" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Sopa</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-pratos-carne-tab" data-toggle="pill" href="#custom-tabs-one-pratos-carne" role="tab" aria-controls="custom-tabs-one-pratos-carne" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Carne</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-pratos-peixe-tab" data-toggle="pill" href="#custom-tabs-one-pratos-peixe" role="tab" aria-controls="custom-tabs-one-pratos-peixe" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Peixe</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-pratos-peixe-tab" data-toggle="pill" href="#custom-tabs-one-sobremesa" role="tab" aria-controls="custom-tabs-one-sobremesa" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Sobremesa</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-bebidas-tab" data-toggle="pill" href="#custom-tabs-one-bebidas" role="tab" aria-controls="custom-tabs-one-bebidas" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Bebidas</h6></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active d-flex justify-content-center" id="custom-tabs-one-entradas" role="tabpanel" aria-labelledby="custom-tabs-one-entradas-tab">
                           <div class="row col-md-12 ">
                               <?php foreach ($produtos as $produto):?>
                               <div class="col-md-4 d-inline-block">
                                   <div class="row d-flex justify-content-center">
                                       <div class="card bg-light m-2" style="width: 18rem;">
                                           <div class="row d-flex justify-content-center mt-3">
                                               <img class="card-img-top" src="img/soup.png"  style="width: 80px; height: 80px; " alt="Card image cap">
                                           </div>
                                           <div class="card-body p-1">
                                               <div class="row ml-2 mr-2 mt-2 d-flex justify-content-center">
                                                   <div class=" d-flex justify-content-center">
                                                       <b><?=$produto->nome?></b>
                                                   </div>
                                               </div>
                                               <div class="row justify-content-center mr-2 ml-2">
                                                   <div class="text-center mt-4">
                                                       <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewProduto<?=$produto->id?>">
                                                           <i class="fas fa-eye"></i>
                                                       </button>
                                                       <a href="<?=Url::toRoute(['produto/update', 'id' => $produto->id])?>" type="button" class="btn btn-warning">
                                                           <i class="far fa-edit color-white"></i>
                                                       </a>
                                                       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#apagarProduto<?=$produto->id?>">
                                                           <i class="fas fa-trash-alt"></i>
                                                       </button>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="modal fade"  id="viewProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog modal-lg">
                                       <div class="modal-content mt-2" >
                                           <div class="modal-header">
                                               <h3><?=$produto->nome?> </h3>
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">
                                               <div class="row">
                                                   <div class="col-12 col-sm-6">
                                                       <div class="card card-dark">
                                                           <div class="card-header">
                                                               <h3 class="card-title">
                                                                   <i class="fas fa-exclamation-triangle"></i>
                                                                   Ingredientes
                                                               </h3>
                                                           </div>
                                                           <div class="card-body">
                                                               <?=$produto->ingredientes?>
                                                           </div>
                                                           <!-- /.card-body -->
                                                       </div>
                                                       <div class="card card-dark">
                                                           <div class="card-header">
                                                               <h3 class="card-title">
                                                                   <i class="fas fa-exclamation-triangle"></i>
                                                                   Categorias
                                                               </h3>
                                                           </div>
                                                           <div class="card-body">
                                                               <!--                                                                       --><?php
                                                               //                                                                            foreach ($categoria_produto_categoria as $itemCategoriaProdutoCategoria):
                                                               //                                                                                foreach ($categorias as $itemCategoriaProduto):
                                                               //                                                                                   if ($itemCategoriaProdutoCategoria->id_categoria_produto == $itemCategoriaProduto->id && $itemCategoriaProdutoCategoria->id_produto == $produto->id){?>
                                                               <!--                                                                                        <span class="badge-indigo">--><?//=$itemCategoriaProduto->categoria?><!--</span>-->
                                                               <!--                                                                       --><?php //}endforeach;endforeach;?>
                                                           </div>
                                                           <!-- /.card-body -->
                                                       </div>
                                                   </div>
                                                   <div class="col-12 col-sm-6">
                                                       <div class="col-12 d-flex justify-content-center">
                                                           <img src="img/soup.png" class=""  style="width:200px; height: 200px;" alt="Product Image">
                                                       </div>
                                                       <div class="bg-gradient-dark py-2 px-3 mt-5">
                                                           <h2 class="mb-0">
                                                               80.00 €
                                                           </h2>
                                                       </div>
                                                   </div>
                                               </div>

                                           </div>
                                           <div class="modal-footer">
                                               <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="modal fade"  id="apagarProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                       <div class="modal-content mt-2" >
                                           <div class="modal-header">
                                               <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i> Tem a certeza que quer apagar?</h5>
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">
                                               <div class="row">
                                                   Após apagar o produto selecionado não é possivel reverter.
                                               </div>
                                           </div>
                                           <div class="modal-footer">
                                               <button type="button" href="<?=Url::toRoute(['produto/delete', 'id' => $produto->id])?>" data-method="POST" class="btn btn-outline-success" data-dismiss="modal"><b>SIM</b></button>
                                               <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <?php endforeach;?>
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
