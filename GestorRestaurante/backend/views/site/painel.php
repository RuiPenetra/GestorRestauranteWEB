<?php

/* @var $this yii\web\View */

$this->title = 'Gestor Restaurante';
$nome='';
use yii\helpers\Url; ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $this->title = 'Home';?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <button id="teste"></button>

                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= Url::toRoute(['site/index']) ?>">Home</a></li>
                    <li class="breadcrumb-item active"><?=$this->title?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="site-index">
    <div class="row">
        <!-- CARD - UTILIZADORES -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Utilizador</b></h4>

                    <p>%</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Mais informação <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- CARD - CARGOS -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h4><b>Cargo</b></h4>

                    <p>%</p>
                </div>
                <div class="icon">
                    <i class="ion ion-arrow-graph-up-right"></i>
                </div>
                <a href="#" class="small-box-footer" >
                    Mais informação <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- CARD - CATEGORIA PRODUTOS -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h4><b>Categoria Produtos</b></h4>

                    <p>%</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pricetags"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Mais informação <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- CARD - RESERVAS -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h4><b>Reserva</b></h4>

                    <p>%</p>
                </div>
                <div class="icon">
                    <i class="ion ion-wineglass"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Mais informação <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <!-- CARD - PRODUTOS -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h4><b>Produtos</b></h4>

                    <p>%</p>
                </div>
                <div class="icon">
                    <i class="ion ion-fork"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Mais informação <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- CARD - PEDIDOS -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h4><b>Pedidos</b></h4>

                    <p>%</p>
                </div>
                <div class="icon">
                    <i class="ion ion-spoon"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Mais informação <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- CARD - FALTAS -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h4><b>Faltas</b></h4>

                    <p>%</p>
                </div>
                <div class="icon">
                    <i class="ion ion-clipboard"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Mais informação <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- CARD - HORÁRIOS -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-orange">
                <div class="inner">
                    <h4 style="color: white"><b>Horários</b></h4>

                    <p style="color: white">%</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-calendar"></i>
                </div>
                <a href="#" class="small-box-footer"  >
                     Mais informação <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</div>

