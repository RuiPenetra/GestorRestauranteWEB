 function mostrarInput() {
    var checkBoxTakeaway = document.getElementById("checkShow");
    var checkBoxRestaurante = document.getElementById("checkHide");
    var text_restaurante = document.getElementById("showRestaurante");
    var text_takeaway = document.getElementById("showTakeaway");


    if (checkBoxTakeaway.checked == true){

        text_takeaway.style.display = "block";
        text_restaurante.style.display = "none";
        document.getElementById('dropDownMesas').value = "";

    }else{
        document.getElementById('inputNome').value = "";
        text_takeaway.style.display = "none";
        text_restaurante.style.display = "block";
    }

}

 function sync(id_produto_selecionado)
 {
     var id_produto = document.getElementById('input_id_produto');
     id_produto.value = id_produto_selecionado.value;
 }

 function syncapagar(id_mesa_selecionado)
 {
     var id_mesa = document.getElementById('input_id_mesa');
     id_mesa.value = id_mesa_selecionado.value;
 }
/*
if(document.getElementById("checkHide").checked==true){

    document.getElementById("checkShow").checked=false;
}*/

 /* $(document.getElementById("checkShow")).mousedown(function () {
      document.getElementById("checkShow").checked=true;
      document.getElementById("checkHide").checked=false;;
  });
  $(document.getElementById("checkHide")).mousedown(function () {
      document.getElementById("checkHide").checked=true;
      document.getElementById("checkShow").checked=false;;
  });*/
 <?php

     use yii\helpers\Html;
 use yii\helpers\Url;
 use yii\widgets\ActiveForm;

 /* @var $this yii\web\View */
 /* @var $model common\models\Pedido */

 $this->title = 'Create Pedido';
 $this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
 $this->params['breadcrumbs'][] = $this->title;
     ?>
 <?php $form = ActiveForm::begin(); ?>
 <div class="card card-warning mr-5 ml-5"> <!--collapsed-card-->
     <div class="card-header">
     <h3 class="card-title">
     <i class="fas fa-bullhorn"></i>
 2º Passo
 </h3>
 <div class="card-tools">
     <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
     </button>
     </div>
     </div>
     <div class="card-body" style="display: block;">
     <div class="row col-md-12">
 <?php if($pedido->tipo==0):?>
 <div class="col-md-12 d-flex justify-content-center">

     <table class="table">
     <thead>
     <tr>
     <th style="width: 60px" class="text-center"></th>
     <th class="text-center">Nº</th>
     <th class="text-center">Lugares</th>
     <th class="text-center">Estado</th>
     <th class="text-center"></th>
 </tr>
 </thead>
 <tbody>
 <?php foreach ($mesas->models as $mesa):?>

 <tr>
 <td class="text-center"><img src="https://img.icons8.com/fluent-systems-filled/24/000000/table.png"/></td>
     <td class="text-center"><?=$mesa->id?></td>
 <td class="text-center"><?=$mesa->n_lugares?></td>
 <?php if($mesa->estado==0):?>
 <td class="text-center"><span class="badge bg-dark">Reservada</span></td>
 <?php endif;?>
 <?php if($mesa->estado==1):?>
 <td class="text-center"><span class="badge bg-warning">Ocupada</span></td>
 <?php endif;?>
 <?php if($mesa->estado==2):?>
 <td class="text-center"><span class="badge bg-success">Livre</span></td>
 <?php endif;?>
 <td class="text-center">
 <?= $form->field($pedido, 'id_mesa')->radio(['value'=>$mesa->id,'label'=>'Selecionar'])->label(false)?>
 </td>
 </tr>

 <?php endforeach;?>
 </tbody>
 </table>
 </div>
 <?php endif;?>
 <?php if($pedido->tipo==1) :?>
 <?= $form->field($pedido, 'nome_pedido')->textInput(['class'=>'form-control rounded', 'placeholder'=>'Nome Pedido'])->label(false) ?>
 <?php endif;?>
 </div>
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
 <?=$form->field($pedido,'nota')->textArea([ 'class'=>'col-12','maxlength' => 300, 'rows' => 3 , 'cols' => 40,'placeholder'=>'Nota'])->label(false)?>
 <?=$form->field($pedido,'quantidade')->textInput(['type'=>'number'])?>
 <?=$form->field($pedido,'id_produto')->textInput(['label'=>'Selecionar'])->label(false)?>
 <?= Html::submitButton('Criar', ['class' => 'btn login_btn col-md-4']) ?>
 <?php ActiveForm::end(); ?>

 <?php foreach ($produtos as $produto_categoria):?>
 <?php if ($produto_categoria->categoriaProduto->categoria=="Entrada"){?>
 <div class="col-md-4 d-inline-block">
         <div class="row d-flex justify-content-center">
         <div class="card bg-light m-2" style="width: 18rem;">
         <div class="row d-flex justify-content-center mt-3">
         <img class="card-img-top" src="img/soup.png"  style="width: 80px; height: 80px; " alt="Card image cap">
         </div>
         <div class="card-body p-1">
         <div class="row ml-2 mr-2 mt-2 d-flex justify-content-center">
         <div class=" d-flex justify-content-center">
     <b><?=$produto_categoria->produto->nome?></b>
     </div>
     </div>
     <div class="row justify-content-center mr-2 ml-2">
         <div class="text-center mt-4">
         <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewProduto<?=$produto_categoria->id_produto?>">
         <i class="fas fa-eye"></i>
         </button>
         </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         <div class="modal fade"  id="viewProduto<?=$pedido->id_produto=$produto_categoria->id_produto?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
         <div class="modal-content mt-2" >
         <div class="modal-header">
     <h3><?=$produto_categoria->produto->nome?> </h3>
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
     <?=$produto_categoria->produto->ingredientes?>
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
     <?php $produto_categoria->produto->preco?> €
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
         <div class="modal fade"  id="itemPedido<?=$produto_categoria->id_produto?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
     <?=$form->field($pedido,'produto.nome')->textInput(['readonly'=>true,'value'=>$produto_categoria->id_produto])?>
 <?=$form->field($pedido,'nota')->textarea()?>
 <?=$form->field($pedido,'quantidade')->textInput(['type'=>'numeric'])?>
 </div>
     </div>
     <div class="modal-footer">
     <?= Html::submitButton('Seguinte', ['class' => 'btn btn-success']) ?>
 <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
     </div>
     </div>
     </div>
     </div>
     <?php }?>
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


