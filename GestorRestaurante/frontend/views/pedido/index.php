<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index">
    <?php $id = Yii::$app->user->identity->id; ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <div class="d-flex justify-content-center mt-4">
        <?= Html::a('Criar Takeaway', ['pedido/create','tipo'=>1], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php if(Yii::$app->authManager->getAssignment('cliente',$id) != null):?>
    <div class="card card-outline card-danger mr-5 ml-5"><!--collapsed-card-->
    <?php endif?>
     <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null):?>
        <div class="card card-outline card-blue mr-5 ml-5"><!--collapsed-card-->
        <?php endif?>


        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-shopping-bag"></i>
                Lista pedidos
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

            <div class="card-body">
                <?php if (Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null):?>
                <?php echo $this->render('//pedido/_search', ['model' => $searchModel, 'mesas' => $mesas]); ?>
                <?php endif?>
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 20%">
                            ID Cliente
                        </th>
                        <th style="width: 30%">
                            Tipo
                        </th>
                        <th style="width: 20%">
                            Nome Pedido
                        </th>
                        <th style="width: 9%" class="text-center">
                            Estado
                        </th>
                        <th style="width: 200%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dataProvider->models as $pedido): ?>
                        <tr>
                            <td>
                                <a>
                                    <?= $pedido->id_perfil ?>
                                </a>
                                <br>
                                <small>
                                    Criado:<?= $pedido->data ?>
                                </small>
                            </td>
                            <td>
                                <?php if($pedido->tipo==1):?>
                                    <span class='badge badge-orange'>Take away</span>
                                <?php endif;?>

                                <?php if($pedido->tipo==0):?>
                                    <span class='badge badge-danger text-white'>Restaurante</span>
                                <?php endif;?>
                            </td>
                            <td class="project_progress">
                                <?= $pedido->nome_pedido ?>
                            </td>

                            <td class="project-state">

                                <?php if ($pedido->estado == 0) {
                                    echo "<span class='badge badge-info-black'>Em Processo</span>";
                                } ?>

                                <?php if ($pedido->estado == 1) {
                                    echo "<span class='badge badge-warning'>Em Progresso</span>";
                                } ?>

                                <?php if ($pedido->estado == 2) {
                                    echo "<span class='badge badge-success'>Concluido</span>";
                                } ?>
                            <td class="project-actions text-right">

                                <?php if($pedido->estado==0){?>
                                <?= Html::a('<i class="far fa-trash-alt color-white"></i>', ['pedido/delete', 'id' => $pedido->id], ['class' => 'btn btn-danger btn-sm','data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ]]);
                                }?>

                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>

    </div>


</div>

