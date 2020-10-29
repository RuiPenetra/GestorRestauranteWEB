<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
?>

<div class="row">
    <!-- CARD - UTILIZADORES -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h4><b>Utilizadore</b></h4>

                <p>%</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer"  data-card-widget="maximize">
                Mais informação <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- CARD - PERFIL -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-gray">
            <div class="inner">
                <h4><b>Perfil</b></h4>

                <p>%</p>
            </div>
            <div class="icon">
                <i class="fas fa-address-card"></i>
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
                <i class="fas fa-user-tag"></i>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                Launch Primary Modal
            </button>
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
                <i class="fas fa-tags"></i>
            </div>
            <a href="#" class="small-box-footer" data-card-widget="maximize">
                Mais informação <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.card -->