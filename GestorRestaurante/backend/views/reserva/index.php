<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReservaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row col-md-12 d-flex justify-content-center">
    <?= Html::a('<div class="col-md-4">
                <!-- small card -->
                <div class="small-box bg-teal p-3" style="width: 300px">
                    <div class="inner text-white">
                        <h4><b>Novo</b></h4>
                    </div>
                    <div class="icon">
                        <i class="fas fa-marker"></i>
                    </div>
                </div>
              </div>',['reserva/create']) ?>
</div>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'n_pessoas',
            'data_hora',
            'nome_da_reserva',
            'tempo_reserva',
            //'id_mesa',
            //'id_funcionario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
