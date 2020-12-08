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
<div class="card card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-bullhorn"></i>
            <b>1º Passo -</b> Selecione o tipo de pedido
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <div class="row col-md-12">
            <div class="row col-md-12 d-flex justify-content-center">

                <?= Html::a('<div class="col-md-4">
                                    <!-- small card -->
                                    <div class="small-box bg-gradient-maroon p-3" style="width: 300px">
                                        <div class="inner">
                                            <h4><b>Restaurante</b></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-arrow-graph-up-right"></i>
                                        </div>
                                    </div>
                                  </div>',
                    ['pedido/criar2passo','tipo'=>0], [ 'class'=>''])?>

                <?= Html::a('<div class="col-md-4">
                                    <!-- small card -->
                                    <div class="small-box bg-gradient-info p-3" style="width: 300px">
                                        <div class="inner">
                                            <h4><b>Takeaway</b></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-arrow-graph-up-right"></i>
                                        </div>
                                    </div>
                                  </div>',
                    ['pedido/criar2passo','tipo'=>1], [ 'class'=>''])?>
            </div>
        </div>
    </div>


