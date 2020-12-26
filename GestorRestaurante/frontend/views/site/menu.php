<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Gestor Restaurante';
?>
<h1 align="center"><b>Ementa</b></h1>
<div class="site-index-img">

</div>
<br>
<div class="card card-lime mr-5 ml-5">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-utensils"></i>
            <b>Lista Ementas</b>
        </h3>
    </div>


    <div class="card-body p-0">
        <!-- /.card-header -->
        <?php echo $this->render('//produto/_search', ['model' => $searchModel,'categorias'=>$categorias]); ?>
        <div class="row">
            <table class="table table-striped projects mr-2 ml-2" >
                <thead>
                <tr>
                    <th class="text-center">
                        Nome
                    </th>
                    <th class="text-center">
                        Categoria
                    </th>
                    <th class="text-center">
                        Preco
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dataProvider->models as $produto):?>
                <tr>
                    <td class="text-center">
                        <ul class="list-inline">

                            <li class="list-inline-item">
                                <?= $produto->nome?>
                            </li>

                        </ul>

                    </td>
                    <td class="text-center">
                        <?= ($produto->categoria->nome)?>
                    </td >
                    <td class="text-center">
                        <ul class="list-inline">

                            <li class="list-inline-item">
                                <?= $produto->preco?>€
                            </li>

                    <td class="text-center">
                        <ul>
                        <?php endforeach;?>


<div class="container-fluid">


</div>