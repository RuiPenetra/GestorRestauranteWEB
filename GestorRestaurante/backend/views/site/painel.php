<?php

/* @var $this yii\web\View */

$this->title = 'Painel';
$nome='';
use yii\helpers\Url; ?>
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
                    <i class="fas fa-users"></i>
                </div>
                <a href="<?= Url::toRoute(['user/index']) ?>" class="small-box-footer">
                    Mais informação <i class="fas fa-arrow-circle-right btn_user"></i>
                </a>
            </div>
        </div>
        <!-- CARD - MESAS -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h4><b>Mesas</b></h4>

                    <p>%</p>
                </div>
                <div class="icon">
                    <i class="fas fa-table"></i>
                </div>
                <a href="<?= Url::toRoute(['mesa/index']) ?>" class="small-box-footer" >
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
                <a href="<?= Url::toRoute(['categoriaproduto/index']) ?>" class="small-box-footer">
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
                    <i class="fas fa-marker"></i>
                </div>
                <a href="<?= Url::toRoute(['reserva/index']) ?>" class="small-box-footer">
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
                    <i class="fas fa-utensils"></i>
                </div>
                <a href="<?= Url::toRoute(['produto/index']) ?>" class="small-box-footer btn-produto">
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
                    <i class="fas fa-truck"></i>
                </div>
                <a href="<?= Url::toRoute(['pedido/index']) ?>" class="small-box-footer">
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
                    <i class="fas fa-user-alt-slash"></i>
                </div>
                <a href="<?= Url::toRoute(['falta/index']) ?>" class="small-box-footer">
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
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <a href="<?= Url::toRoute(['horario/index']) ?>" class="small-box-footer"  >
                     Mais informação <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</div>

