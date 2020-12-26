<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReservaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex justify-content-center"
        <p>
            <?= Html::a('Create Reserva', ['create'], ['class' => 'btn btn-danger']) ?>
        </p>
    </div>


    <div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-marker"></i>
                Lista de Reservas
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: block;">
            <div class="row d-flex justify-content-center">
                <?php echo $this->render('_search', ['model' => $searchModel]); ?>

                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 60px" class="text-center"></th>
                        <th class="text-center">Nome da Reserva</th>
                        <th class="text-center">Nº Pessoas</th>
                        <th class="text-center">Data e Hora</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dataProvider->models as $reserva):?>
                    <tr>
                        <td class="text-center"><i class="fas fa-marker"></i></td>
                        <td class="text-center"><?=$reserva->nome_da_reserva?></td>
                        <td class="text-center"><?=$reserva->n_pessoas?></td>
                        <td class="text-center"><?=$reserva->data_hora?></td>
                        <?php if($reserva->nome_da_reserva):?>
                            <td class="text-center"><span class="badge bg-dark">Reservada</span></td>
                        <?php endif;?>

                        <td class="project-actions text-center">
                            <?= Html::a('<i class="fas fa-eye"></i>', ['reserva/view', 'id' => $reserva->id], ['class' => 'btn btn-info btn-sm']) ?>
                            <?= Html::a('<i class="far fa-edit color-white"></i>', ['reserva/update', 'id' => $reserva->id], ['class' => 'btn btn-warning btn-sm']) ?>
                            <?= Html::a('<i class="far fa-trash-alt color-white"></i>', ['reserva/delete', 'id' => $reserva->id], ['class' => 'btn btn-danger btn-sm','data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ]]) ?>

                            </a>
                        </td>
                    </tr>
                    <?php endforeach;?>


</div>
